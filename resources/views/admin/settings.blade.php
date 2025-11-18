@extends('admin.layout')

@section('title', 'Site Settings')

@section('content')
<div class="container-fluid py-4">
    <div class="row mb-4">
        <div class="col-md-6">
            <h1 class="h3 mb-0">Site Settings</h1>
            <p class="text-muted">Manage your website configuration</p>
        </div>
        <div class="col-md-6 text-md-end">
            <a href="{{ route('page.landing') }}" class="btn btn-outline-secondary" target="_blank">
                <i class="bi bi-box-arrow-up-right"></i> View Site
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white">
            <h5 class="mb-0"><i class="bi bi-gear"></i> Update Site Settings</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.settings.update') }}">
                @csrf
                
                <div class="row mb-4">
                    <div class="col-md-12">
                        <h6 class="text-primary border-bottom pb-2">Basic Information</h6>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="site_name" class="form-label">Site Name *</label>
                        <input type="text" class="form-control @error('site_name') is-invalid @enderror" id="site_name" name="site_name" 
                               value="{{ old('site_name', $siteSettings['site_name'] ?? 'IVS') }}" required>
                        <small class="text-muted">This appears in header, footer, and throughout the site</small>
                        @error('site_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="site_title" class="form-label">Site Title *</label>
                        <input type="text" class="form-control @error('site_title') is-invalid @enderror" id="site_title" name="site_title" 
                               value="{{ old('site_title', $siteSettings['site_title'] ?? '') }}" required>
                        <small class="text-muted">Shown in browser tab</small>
                        @error('site_title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="site_tagline" class="form-label">Site Tagline</label>
                        <input type="text" class="form-control @error('site_tagline') is-invalid @enderror" id="site_tagline" name="site_tagline" 
                               value="{{ old('site_tagline', $siteSettings['site_tagline'] ?? '') }}">
                        @error('site_tagline')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-12">
                        <h6 class="text-primary border-bottom pb-2">Contact Information</h6>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="contact_email" class="form-label">Contact Email *</label>
                        <input type="email" class="form-control @error('contact_email') is-invalid @enderror" id="contact_email" name="contact_email" 
                               value="{{ old('contact_email', $siteSettings['contact_email'] ?? '') }}" required>
                        @error('contact_email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="contact_phone" class="form-label">Contact Phone *</label>
                        <input type="text" class="form-control @error('contact_phone') is-invalid @enderror" id="contact_phone" name="contact_phone" 
                               value="{{ old('contact_phone', $siteSettings['contact_phone'] ?? '') }}" required>
                        @error('contact_phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="contact_address" class="form-label">Address</label>
                        <input type="text" class="form-control @error('contact_address') is-invalid @enderror" id="contact_address" name="contact_address" 
                               value="{{ old('contact_address', $siteSettings['contact_address'] ?? '') }}">
                        @error('contact_address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="contact_city" class="form-label">City</label>
                        <input type="text" class="form-control @error('contact_city') is-invalid @enderror" id="contact_city" name="contact_city" 
                               value="{{ old('contact_city', $siteSettings['contact_city'] ?? '') }}">
                        @error('contact_city')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="contact_state" class="form-label">State</label>
                        <input type="text" class="form-control @error('contact_state') is-invalid @enderror" id="contact_state" name="contact_state" 
                               value="{{ old('contact_state', $siteSettings['contact_state'] ?? '') }}">
                        @error('contact_state')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="contact_zip" class="form-label">ZIP Code</label>
                        <input type="text" class="form-control @error('contact_zip') is-invalid @enderror" id="contact_zip" name="contact_zip" 
                               value="{{ old('contact_zip', $siteSettings['contact_zip'] ?? '') }}">
                        @error('contact_zip')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-12">
                        <h6 class="text-primary border-bottom pb-2">Social Media Links</h6>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="social_facebook" class="form-label">Facebook URL</label>
                        <input type="url" class="form-control @error('social_facebook') is-invalid @enderror" id="social_facebook" name="social_facebook" 
                               value="{{ old('social_facebook', $siteSettings['social_facebook'] ?? '') }}" placeholder="https://facebook.com/yourpage">
                        @error('social_facebook')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="social_twitter" class="form-label">Twitter/X URL</label>
                        <input type="url" class="form-control @error('social_twitter') is-invalid @enderror" id="social_twitter" name="social_twitter" 
                               value="{{ old('social_twitter', $siteSettings['social_twitter'] ?? '') }}" placeholder="https://twitter.com/yourhandle">
                        @error('social_twitter')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="social_instagram" class="form-label">Instagram URL</label>
                        <input type="url" class="form-control @error('social_instagram') is-invalid @enderror" id="social_instagram" name="social_instagram" 
                               value="{{ old('social_instagram', $siteSettings['social_instagram'] ?? '') }}" placeholder="https://instagram.com/yourhandle">
                        @error('social_instagram')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="social_linkedin" class="form-label">LinkedIn URL</label>
                        <input type="url" class="form-control @error('social_linkedin') is-invalid @enderror" id="social_linkedin" name="social_linkedin" 
                               value="{{ old('social_linkedin', $siteSettings['social_linkedin'] ?? '') }}" placeholder="https://linkedin.com/company/yourcompany">
                        @error('social_linkedin')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-12">
                        <h6 class="text-primary border-bottom pb-2">Additional Settings</h6>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="footer_text" class="form-label">Footer Description</label>
                        <textarea class="form-control @error('footer_text') is-invalid @enderror" id="footer_text" name="footer_text" rows="3">{{ old('footer_text', $siteSettings['footer_text'] ?? '') }}</textarea>
                        @error('footer_text')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="copyright_text" class="form-label">Copyright Text</label>
                        <input type="text" class="form-control @error('copyright_text') is-invalid @enderror" id="copyright_text" name="copyright_text" 
                               value="{{ old('copyright_text', $siteSettings['copyright_text'] ?? '') }}">
                        @error('copyright_text')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="bi bi-save"></i> Save All Settings
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
