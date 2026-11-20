<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Contact;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ArahCreativeTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Test public homepage returns status 200 and brand tagline
     */
    public function test_homepage_loads_successfully(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('We Give Ideas a Direction', false);
        $response->assertSee('PT Arah Kreasi Digital', false);
    }

    /**
     * Test about page loads
     */
    public function test_about_page_loads_successfully(): void
    {
        $response = $this->get('/about');
        $response->assertStatus(200);
        $response->assertSee('Filosofi', false);
        $response->assertSee('Visi Perusahaan', false);
    }

    /**
     * Test services catalog & detail page
     */
    public function test_services_catalog_and_detail_load(): void
    {
        $response = $this->get('/services');
        $response->assertStatus(200);

        $service = Service::published()->first();
        if ($service) {
            $detailResponse = $this->get('/services/' . $service->slug);
            $detailResponse->assertStatus(200);
            $detailResponse->assertSee($service->name);
        }
    }

    /**
     * Test portfolio catalog & detail page
     */
    public function test_portfolio_catalog_and_detail_load(): void
    {
        $response = $this->get('/portfolio');
        $response->assertStatus(200);

        $portfolio = Portfolio::published()->first();
        if ($portfolio) {
            $detailResponse = $this->get('/portfolio/' . $portfolio->slug);
            $detailResponse->assertStatus(200);
            $detailResponse->assertSee($portfolio->title);
        }
    }

    /**
     * Test contact page and submission with validation
     */
    public function test_contact_form_submission_and_validation(): void
    {
        $response = $this->get('/contact');
        $response->assertStatus(200);

        // Invalid submission (empty fields)
        $invalidResponse = $this->post('/contact', []);
        $invalidResponse->assertSessionHasErrors(['name', 'email', 'message']);

        // Valid submission
        $service = Service::first();
        $validResponse = $this->post('/contact', [
            'name' => 'Budi Santoso',
            'email' => 'budi@example.com',
            'phone' => '081234567890',
            'service_id' => $service?->id,
            'message' => 'Halo ARAH Creative, kami ingin konsultasi pembuatan brand identity baru.',
        ]);

        $validResponse->assertRedirect('/contact');
        $validResponse->assertSessionHas('success');

        $this->assertDatabaseHas('contacts', [
            'email' => 'budi@example.com',
            'name' => 'Budi Santoso',
        ]);
    }

    /**
     * Test admin authentication guard
     */
    public function test_guest_is_redirected_from_admin_dashboard(): void
    {
        $response = $this->get('/admin/dashboard');
        $response->assertRedirect('/admin/login');
    }

    /**
     * Test admin login and logout
     */
    public function test_admin_can_login_and_logout(): void
    {
        $loginResponse = $this->post('/admin/login', [
            'email' => 'admin@arahcreative.com',
            'password' => 'password123',
        ]);

        $loginResponse->assertRedirect('/admin/dashboard');
        $this->assertAuthenticated();

        // Logout
        $logoutResponse = $this->post('/admin/logout');
        $logoutResponse->assertRedirect('/admin/login');
        $this->assertGuest();
    }

    /**
     * Test Category CRUD in Admin
     */
    public function test_admin_can_crud_category(): void
    {
        $admin = User::first();

        // Create
        $response = $this->actingAs($admin)->post('/admin/categories', [
            'name' => 'UI UX Strategy Test',
            'slug' => 'ui-ux-strategy-test',
            'description' => 'Kategori testing untuk validasi fitur admin.',
        ]);
        $response->assertRedirect('/admin/categories');
        $this->assertDatabaseHas('categories', ['slug' => 'ui-ux-strategy-test']);

        $category = Category::where('slug', 'ui-ux-strategy-test')->first();

        // Update
        $updateResponse = $this->actingAs($admin)->put('/admin/categories/' . $category->id, [
            'name' => 'UI UX Strategy Updated',
            'slug' => 'ui-ux-strategy-test',
            'description' => 'Deskripsi terupdate.',
        ]);
        $updateResponse->assertRedirect('/admin/categories');
        $this->assertDatabaseHas('categories', ['name' => 'UI UX Strategy Updated']);

        // Delete
        $deleteResponse = $this->actingAs($admin)->delete('/admin/categories/' . $category->id);
        $deleteResponse->assertRedirect('/admin/categories');
        $this->assertDatabaseMissing('categories', ['id' => $category->id]);
    }

    /**
     * Test Service CRUD with image upload & deletion cleanup
     */
    public function test_admin_can_crud_service_with_image(): void
    {
        Storage::fake('public');
        $admin = User::first();
        $category = Category::first();

        $image = UploadedFile::fake()->image('test-service.jpg');

        // Create
        $response = $this->actingAs($admin)->post('/admin/services', [
            'category_id' => $category->id,
            'name' => 'Layanan Testing Otomatis',
            'slug' => 'layanan-testing-otomatis',
            'short_description' => 'Deskripsi singkat layanan testing.',
            'description' => 'Deskripsi lengkap layanan testing untuk verifikasi upload gambar dan relasi database.',
            'image' => $image,
            'status' => 'published',
        ]);

        $response->assertRedirect('/admin/services');
        $this->assertDatabaseHas('services', ['slug' => 'layanan-testing-otomatis']);

        $service = Service::where('slug', 'layanan-testing-otomatis')->first();
        $this->assertNotNull($service->image);
        Storage::disk('public')->assertExists($service->image);

        // Delete and verify image is cleaned up
        $storedImagePath = $service->image;
        $deleteResponse = $this->actingAs($admin)->delete('/admin/services/' . $service->id);
        $deleteResponse->assertRedirect('/admin/services');
        $this->assertDatabaseMissing('services', ['id' => $service->id]);
        Storage::disk('public')->assertMissing($storedImagePath);
    }

    /**
     * Test Portfolio CRUD with image upload & deletion cleanup
     */
    public function test_admin_can_crud_portfolio_with_image(): void
    {
        Storage::fake('public');
        $admin = User::first();
        $category = Category::first();

        $image = UploadedFile::fake()->image('test-portfolio.png');

        // Create
        $response = $this->actingAs($admin)->post('/admin/portfolios', [
            'category_id' => $category->id,
            'title' => 'Proyek Testing Portfolio',
            'slug' => 'proyek-testing-portfolio',
            'client_name' => 'PT Klien Maju Bersama',
            'project_year' => '2026',
            'description' => 'Deskripsi studi kasus proyek testing portfolio dengan upload thumbnail.',
            'image' => $image,
            'status' => 'published',
        ]);

        $response->assertRedirect('/admin/portfolios');
        $this->assertDatabaseHas('portfolios', ['slug' => 'proyek-testing-portfolio']);

        $portfolio = Portfolio::where('slug', 'proyek-testing-portfolio')->first();
        $this->assertNotNull($portfolio->image);
        Storage::disk('public')->assertExists($portfolio->image);

        // Delete and verify image is cleaned up
        $storedImagePath = $portfolio->image;
        $deleteResponse = $this->actingAs($admin)->delete('/admin/portfolios/' . $portfolio->id);
        $deleteResponse->assertRedirect('/admin/portfolios');
        $this->assertDatabaseMissing('portfolios', ['id' => $portfolio->id]);
        Storage::disk('public')->assertMissing($storedImagePath);
    }
}
