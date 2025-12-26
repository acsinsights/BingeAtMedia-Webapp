<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Testimonial;
use App\Models\Blog;
use App\Models\Counter;
use App\Models\WebsiteData;
use App\Models\PageMeta;
use App\Models\EnquiryLead;
use App\Mail\ContactFormSubmitted;
use App\Mail\EnquiryFormSubmitted;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class PageController extends Controller
{
    /**
     * Get page meta data by route name
     */
    protected function getPageMeta($routeName)
    {
        return PageMeta::where('route_name', $routeName)->first();
    }
    /**
     * Display the home page
     */
    public function home()
    {
        $testimonials = Testimonial::published()->orderBy('created_at', 'desc')->get();
        $blogs = Blog::published()->orderBy('date', 'desc')->limit(3)->get();
        $pageMeta = $this->getPageMeta('frontend.home');
        return view('frontend.home', compact('testimonials', 'blogs', 'pageMeta'));
    }

    /**
     * Display the about page
     */
    public function about()
    {
        $pageMeta = $this->getPageMeta('frontend.about');
        return view('frontend.about', compact('pageMeta'));
    }

    /**
     * Display the portfolio page
     */
    public function portfolio()
    {
        $pageMeta = $this->getPageMeta('frontend.portfolio');
        return view('frontend.portfolio', compact('pageMeta'));
    }

    /**
     * Display the contact page
     */
    public function contact()
    {
        $slugs = ['contact-phone', 'contact-email', 'contact-address', 'contact-google-maps', 'contact-google-maps-iframe', 'social-whatsapp'];
        $websiteData = WebsiteData::whereIn('slug', $slugs)->get()->keyBy('slug');

        $phone = $websiteData->get('contact-phone');
        $email = $websiteData->get('contact-email');
        $address = $websiteData->get('contact-address');
        $googleMaps = $websiteData->get('contact-google-maps');
        $googleMapsIframe = $websiteData->get('contact-google-maps-iframe');
        $whatsapp = $websiteData->get('social-whatsapp');

        $pageMeta = $this->getPageMeta('frontend.contact');
        return view('frontend.contact', compact('phone', 'email', 'address', 'googleMaps', 'googleMapsIframe', 'whatsapp', 'pageMeta'));
    }

    /**
     * Display the mainland business setup page
     */
    public function mainland()
    {
        $pageMeta = $this->getPageMeta('frontend.business-setup.mainland');
        return view('frontend.business-setup.mainland', compact('pageMeta'));
    }

    /**
     * Display the free zone business setup page
     */
    public function freeZone()
    {
        $pageMeta = $this->getPageMeta('frontend.business-setup.free-zone');
        return view('frontend.business-setup.free-zone', compact('pageMeta'));
    }

    /**
     * Display the offshore business setup page
     */
    public function offshore()
    {
        $pageMeta = $this->getPageMeta('frontend.business-setup.offshore');
        return view('frontend.business-setup.offshore', compact('pageMeta'));
    }

    /**
     * Display the accounting service page
     */
    public function accounting()
    {
        $pageMeta = $this->getPageMeta('frontend.services.accounting');
        return view('frontend.services.accounting-bookkeeping-tax-compliance', compact('pageMeta'));
    }

    /**
     * Display the visa process service page
     */
    public function visaProcess()
    {
        $pageMeta = $this->getPageMeta('frontend.services.visa-process');
        return view('frontend.services.visa-process-services-in-the-uae', compact('pageMeta'));
    }

    /**
     * Display the pro services page
     */
    public function proServices()
    {
        $pageMeta = $this->getPageMeta('frontend.services.pro-services');
        return view('frontend.services.pro-corporate-services', compact('pageMeta'));
    }

    /**
     * Display the web3 digital assets setup page
     */
    public function web3DigitalAssets()
    {
        $pageMeta = $this->getPageMeta('frontend.services.web3-digital-assets');
        return view('frontend.services.web3-digital-asset-setup', compact('pageMeta'));
    }

    /**
     * Display the bank account assistance page
     */
    public function bankAccountAssistance()
    {
        $pageMeta = $this->getPageMeta('frontend.services.bank-account-assistance');
        return view('frontend.services.bank-account-assistance-in-the-uae', compact('pageMeta'));
    }

    /**
     * Display the business advisory and consulting services page
     */
    public function businessAdvisory()
    {
        $pageMeta = $this->getPageMeta('frontend.services.business-advisory');
        return view('frontend.services.business-advisory-consulting-services', compact('pageMeta'));
    }

    /**
     * Display the find office space page
     */
    public function findOfficeSpace()
    {
        $pageMeta = $this->getPageMeta('frontend.services.find-office-space');
        return view('frontend.services.find-office-space-uae', compact('pageMeta'));
    }

    /**
     * Display the HR payroll and WPS services page
     */
    public function hrPayrollWps()
    {
        $pageMeta = $this->getPageMeta('frontend.services.hr-payroll-wps');
        return view('frontend.services.hr-payroll-wps-services', compact('pageMeta'));
    }

    /**
     * Display the cost calculator page
     */
    public function costCalculator()
    {
        $pageMeta = $this->getPageMeta('frontend.cost-calculator');
        return view('frontend.cost-calculator', compact('pageMeta'));
    }
    /**
     * Display the privacy policy page
     */
    public function privacyPolicy()
    {
        $pageMeta = $this->getPageMeta('frontend.privacy-policy');
        return view('frontend.privacy-policy', compact('pageMeta'));
    }
    /**
     * Display the terms of service page
     */
    public function termsOfService()
    {
        $pageMeta = $this->getPageMeta('frontend.terms-of-service');
        return view('frontend.terms-of-service', compact('pageMeta'));
    }
    /**
     * Display the sitemap page
     */
    public function sitemap()
    {
        $pageMeta = $this->getPageMeta('frontend.sitemap');
        return view('frontend.sitemap', compact('pageMeta'));
    }
    /**
     * Handle contact form submission
     */
    public function submitContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'service' => 'nullable|string|max:255',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string|max:2000',
            'form_type' => 'nullable|string|max:100',
            'source_page' => 'nullable|string|max:255',
        ]);

        $contact = Contact::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'service' => $request->input('service'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
            'form_type' => $request->input('form_type', 'contact'),
            'source_page' => $request->input('source_page', $request->route()?->getName()),
            'source_url' => $request->headers->get('referer'),
        ]);

        // Get notification email, fallback to contact-email if not set
        $notificationEmail = WebsiteData::where('slug', 'notification-email')->value('value');
        if (!$notificationEmail) {
            $notificationEmail = WebsiteData::where('slug', 'contact-email')->value('value');
        }

        if ($notificationEmail) {
            try {
                Mail::to($notificationEmail)->send(new ContactFormSubmitted($contact));
            } catch (\Exception $e) {
                // Log the error but don't fail the request
                Log::error('Failed to send contact form email: ' . $e->getMessage(), [
                    'contact_id' => $contact->id,
                    'notification_email' => $notificationEmail,
                    'error' => $e->getMessage()
                ]);
            }
        } else {
            // Log warning if notification email is not configured
            Log::warning('Contact form submitted but notification email is not configured', [
                'contact_id' => $contact->id,
            ]);
        }

        // Check if request expects JSON (AJAX request)
        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Thank you for your message. We will get back to you soon!'
            ]);
        }

        return redirect()->back()->with('success', 'Thank you for your message. We will get back to you soon!');
    }

    /**
     * Handle consultation form submission
     */
    public function submitConsultation(Request $request)
    {
        $formType = $request->input('form_type', 'consultation');
        $isEnquireSticky = $formType === 'enquire_sticky';

        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:20',
                'service' => 'nullable|string|max:255',
                'message' => 'nullable|string|max:2000',
                'form_type' => 'nullable|string|max:100',
                'source_page' => 'nullable|string|max:255',
                'country_code' => 'nullable|string|max:10',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            if ($isEnquireSticky) {
                return redirect()->back()
                    ->withInput()
                    ->with('enquire_errors', $e->validator->errors()->all());
            }
            throw $e;
        }

        // Combine country code with phone number
        $countryCode = $request->input('country_code', '');
        $phone = $request->input('phone', '');
        $fullPhone = $countryCode ? ($countryCode . ' ' . $phone) : $phone;

        // Ensure message is always a string, never null
        $message = $request->input('message');
        $message = $message !== null ? (string) $message : '';

        $contact = Contact::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $fullPhone,
            'service' => $request->input('service'),
            'subject' => null,
            'message' => $message,
            'form_type' => $formType,
            'source_page' => $request->input('source_page', $request->route()?->getName()),
            'source_url' => $request->headers->get('referer'),
            'country_code' => $countryCode,
        ]);

        // Send email notification
        // Get notification email, fallback to contact-email if not set
        $notificationEmail = WebsiteData::where('slug', 'notification-email')->value('value');
        if (!$notificationEmail) {
            $notificationEmail = WebsiteData::where('slug', 'contact-email')->value('value');
        }

        if ($notificationEmail) {
            try {
                Mail::to($notificationEmail)->send(new ContactFormSubmitted($contact));
            } catch (\Exception $e) {
                // Log the error but don't fail the request
                Log::error('Failed to send contact form email: ' . $e->getMessage(), [
                    'contact_id' => $contact->id,
                    'notification_email' => $notificationEmail,
                    'error' => $e->getMessage()
                ]);
            }
        } else {
            // Log warning if notification email is not configured
            Log::warning('Contact form submitted but notification email is not configured', [
                'contact_id' => $contact->id,
            ]);
        }

        // Return JSON response for AJAX requests
        if ($request->ajax() || $request->wantsJson() || $request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Thank you! We have received your enquiry and will contact you within 24 hours.'
            ], 200);
        }

        // For enquire_sticky form, use specific session variable to keep modal open
        if ($isEnquireSticky) {
            return redirect()->back()
                ->with('enquire_success', 'Thank you! We have received your enquiry and will contact you within 24 hours.');
        }

        return redirect()->back()->with('success', 'Thank you for your consultation request. We will contact you within 24 hours!');
    }

    /**
     * Handle enquiry form submission
     */
    public function submitEnquiry(Request $request)
    {
        $request->validate([
            'serviceName' => 'nullable|string|max:255',
            'clientName' => 'required|string|max:255',
            'clientEmail' => 'required|email|max:255',
            'clientPhone' => 'required|string|max:20',
            'clientMessage' => 'nullable|string|max:2000',
        ]);

        $enquiry = EnquiryLead::create([
            'name' => $request->input('clientName'),
            'email' => $request->input('clientEmail'),
            'phone' => $request->input('clientPhone'),
            'message' => $request->input('clientMessage', ''),
            'source_page' => $request->input('serviceName', 'General Enquiry'),
            'source_url' => $request->headers->get('referer'),
        ]);

        // Get notification email, fallback to contact-email if not set
        $notificationEmail = WebsiteData::where('slug', 'notification-email')->value('value');
        if (!$notificationEmail) {
            $notificationEmail = WebsiteData::where('slug', 'contact-email')->value('value');
        }

        if ($notificationEmail) {
            try {
                Mail::to($notificationEmail)->send(new EnquiryFormSubmitted($enquiry));
            } catch (\Exception $e) {
                // Log the error but don't fail the request
                Log::error('Failed to send enquiry form email: ' . $e->getMessage(), [
                    'enquiry_id' => $enquiry->id,
                    'notification_email' => $notificationEmail,
                    'error' => $e->getMessage()
                ]);
            }
        } else {
            // Log warning if notification email is not configured
            Log::warning('Enquiry form submitted but notification email is not configured', [
                'enquiry_id' => $enquiry->id,
            ]);
        }

        // Return JSON response for AJAX requests
        if ($request->ajax() || $request->wantsJson() || $request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Thank you for your enquiry! We will get back to you soon.'
            ], 200);
        }

        return redirect()->back()->with('success', 'Thank you for your enquiry! We will get back to you soon.');
    }
}
