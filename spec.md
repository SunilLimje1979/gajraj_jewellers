You are a senior CodeIgniter 3, PHP, MySQL, UI/UX, and frontend developer with strong experience building premium jewellery websites.

I have already created a blank CodeIgniter 3 project in the current folder. Use the existing CodeIgniter 3 setup and build the complete project inside it.

## Project Name

Gold Jewellery App Landing Page and Admin CMS

## Main Objective

Build a premium, fast, responsive jewellery shop landing website that mainly promotes the jewellery shop’s Android and iOS mobile application.

The mobile app’s main purpose is to allow customers to join and pay monthly gold-saving or jewellery installment schemes.

This is not a complete jewellery e-commerce website. It is primarily:

* A jewellery shop profile website
* A mobile app promotional landing page
* A gold-saving scheme information website
* A downloadable certificate and policy website
* A small dynamic CMS managed through an admin panel

## Technology Requirements

Use:

* CodeIgniter 3
* PHP
* MySQL
* HTML5
* CSS3
* Bootstrap 5 or a clean custom responsive CSS framework
* JavaScript and jQuery where required
* Font Awesome or another lightweight icon library
* MySQL database
* CodeIgniter Query Builder
* CodeIgniter form validation
* CodeIgniter session authentication
* CSRF protection
* XSS filtering
* Secure file-upload validation

Do not use Laravel, React, Vue, Node.js, or any other framework.

## Database File

Create a complete database SQL file named:

`gold_landing_page.sql`

The SQL file must include:

* All required database tables
* Primary keys
* Foreign keys where required
* Indexes
* Default settings
* Default admin account
* Sample homepage content
* Sample policy pages
* Sample slider records
* Sample certificates
* Created and updated timestamps
* Active and inactive status fields where required

The project should work after importing this SQL file and updating the CodeIgniter database configuration.

## Admin Login

Create a secure admin login page.

Default admin credentials:

* Username: `admin`
* Password: `123123`

Do not store the password as plain text in the database. Store it using PHP password hashing and verify it using `password_verify()`.

Insert the hashed default password through the SQL file.

Admin login URL:

`/admin/login`

Admin panel URL:

`/admin/dashboard`

Protect all admin routes using sessions. Unauthenticated users must be redirected to the admin login page.

Add:

* Login
* Logout
* Change password
* Session validation
* Invalid login message
* Password show/hide option
* Remember username option, but do not remember the password

## Website Structure

Create the following public pages:

1. Home
2. About Jewellery Shop
3. Gold Saving Scheme
4. Mobile App
5. Certificates
6. Contact Us
7. Privacy Policy
8. Terms and Conditions
9. Shipping Policy
10. Return Policy
11. Refund Policy
12. Jewellery Care Policy
13. Disclaimer
14. Custom dynamic content pages
15. 404 page

Policy and custom pages must be dynamically managed through the admin panel.

Use clean SEO-friendly URLs such as:

* `/about-us`
* `/gold-saving-scheme`
* `/mobile-app`
* `/certificates`
* `/contact-us`
* `/privacy-policy`
* `/terms-and-conditions`
* `/shipping-policy`
* `/return-policy`
* `/refund-policy`
* `/page/{slug}`

## Homepage Design

Design one highly polished, premium jewellery landing page.

The design should look trustworthy, luxurious, modern, elegant, and suitable for an established Indian jewellery shop.

Avoid a cheap template look.

The page should focus strongly on downloading the mobile app, but it must also explain the jewellery shop, its trust, schemes, services, and certifications.

## Homepage Sections

### 1. Top Announcement Bar

Create a small configurable announcement bar.

Examples:

* Download our official jewellery app
* Start your monthly gold-saving journey today
* Trusted jewellery service since [year]
* BIS Hallmarked Jewellery

Admin should be able to:

* Enable or disable the bar
* Change the text
* Add a link
* Change the background and text colour

### 2. Header

The header should include:

* Dynamic jewellery shop logo
* Home
* About
* Gold Scheme
* Mobile App
* Certificates
* Contact
* Download App button

Requirements:

* Sticky header
* Responsive mobile menu
* Clean dropdown support
* Active menu state
* Smooth scrolling where appropriate
* Mobile-friendly call-to-action buttons

### 3. Hero Slider

Create a dynamic homepage slider.

Each slide should support:

* Desktop image
* Optional mobile image
* Heading
* Subheading
* Description
* Primary button text
* Primary button link
* Secondary button text
* Secondary button link
* Text alignment
* Overlay opacity
* Sort order
* Active or inactive status

Admin must be able to add, edit, delete, enable, disable, and reorder slides.

The hero slider should contain strong app-download messaging such as:

* Save monthly and build your gold future
* Manage your gold-saving scheme from your phone
* View installments, payments, scheme progress, and updates
* Download our official Android and iOS app

Display Play Store and App Store buttons prominently.

### 4. Jewellery Shop Introduction

Include:

* Shop name
* Short introduction
* Establishment year
* Shop description
* Shop exterior or interior image
* Jewellery experience
* Trust indicators
* BIS hallmarking information
* Customer-first service message

All content should be manageable from the admin panel.

### 5. Mobile App Promotion Section

This should be one of the most visually important sections.

Include:

* Mobile app mockup or screenshot area
* Android download button
* Apple App Store download button
* QR code for app download
* Short app description
* App features
* Strong call-to-action

App features may include:

* Join monthly gold-saving schemes
* View scheme details
* Track monthly installments
* View payment history
* Check due installments
* Receive payment reminders
* View maturity details
* Get jewellery shop updates
* Receive festival and gold-rate notifications
* Contact the jewellery shop
* Secure customer login
* Digital receipts
* Scheme progress tracking

Play Store URL and App Store URL must be configurable through admin settings.

Admin must also be able to upload:

* Android QR code
* iOS QR code
* Mobile app screenshots
* Mobile app promotional image

### 6. Gold Saving Scheme Section

Create a clear scheme explanation section.

Include:

* How the scheme works
* Monthly payment process
* Scheme duration
* Benefits
* Maturity process
* Redemption information
* Important terms
* Call-to-action to download the app
* Contact jewellery shop button

Do not hard-code financial promises.

Admin should manage the complete content through a rich-text editor.

Add a clear disclaimer stating that scheme terms, eligibility, payment schedule, maturity benefits, and redemption conditions are determined by the jewellery shop.

### 7. How It Works

Display a simple step-by-step section:

1. Download the app
2. Register or log in
3. Select or join a scheme
4. Pay monthly installments
5. Track your scheme progress
6. Redeem as per scheme terms

Use premium icons and a clean timeline or card layout.

### 8. Why Choose Us

Create dynamic trust cards such as:

* BIS Hallmarked Jewellery
* Trusted Jewellery Shop
* Transparent Scheme Tracking
* Secure Payment Records
* Digital Installment Receipts
* Personal Customer Support
* Easy App Access
* Years of Experience

Admin should be able to edit these points.

### 9. Jewellery Categories or Collection Preview

This is not an e-commerce section.

Show attractive category cards such as:

* Gold Jewellery
* Diamond Jewellery
* Bridal Jewellery
* Mangalsutra
* Rings
* Necklaces
* Bangles
* Earrings
* Silver Articles

Admin should be able to manage:

* Category name
* Image
* Short description
* Sort order
* Active status

No cart, checkout, or product ordering is required.

### 10. Shop Gallery

Create a dynamic gallery for:

* Jewellery shop interior
* Jewellery displays
* New collections
* Customer events
* Festival decoration
* Awards
* Team photos

Support lightbox viewing.

### 11. Certificates and Trust Documents

Create a dynamic certificates section.

The admin should be able to upload:

* BIS hallmarking certificate
* GST certificate
* Shop Act certificate
* Trade licence
* Awards
* Membership certificates
* Any other business or jewellery certificate

Each certificate record should include:

* Certificate title
* Certificate type
* Description
* Thumbnail
* Certificate file or image
* Issue date
* Expiry date, if applicable
* Sort order
* Active status
* Download enabled or disabled

Visitors should be able to:

* View certificate details
* Preview supported files
* Download the certificate when enabled

Support JPG, JPEG, PNG, AVIF, WebP, and PDF certificate uploads.

PDF files should remain PDF. Images should be optimized and converted to AVIF.

### 12. Testimonials

Create a dynamic testimonial section.

Fields:

* Customer name
* Review
* Rating
* Customer image
* City
* Active status
* Sort order

### 13. Frequently Asked Questions

Create dynamic FAQs related to:

* Gold schemes
* Monthly installments
* App registration
* Payment tracking
* Maturity
* Redemption
* Payment receipts
* Contact support
* Android and iOS downloads

Admin should manage all questions and answers.

### 14. Contact and Visit Store Section

Include:

* Shop name
* Complete address
* Google Maps embed
* Phone number
* WhatsApp number
* Email address
* Business hours
* Call Now button
* WhatsApp button
* Get Directions button
* Contact enquiry form

Contact form fields:

* Name
* Mobile number
* Email
* Subject
* Message

Save enquiries in the database.

Admin should be able to view enquiries and mark them as:

* New
* Contacted
* Resolved
* Closed

Add spam protection using a honeypot field or simple CAPTCHA.

### 15. Final App Download CTA

Add a strong full-width call-to-action before the footer.

Example:

“Start your gold-saving journey with our official mobile app.”

Include:

* Android Play Store button
* Apple App Store button
* QR code
* Contact jewellery shop button

### 16. Footer

Include:

* Dynamic logo
* Short shop description
* Contact details
* Quick links
* Policy links
* Certificates link
* Play Store button
* App Store button
* Social media links
* Copyright text
* Developer credit setting
* Newsletter field only if properly implemented

## Floating Buttons

Add responsive floating buttons for:

* WhatsApp
* Call
* Download App
* Back to top

Allow the admin to enable or disable each button.

## Admin Panel Modules

Create a professional, responsive admin panel with the following modules.

### Dashboard

Show:

* Total enquiries
* New enquiries
* Total sliders
* Total certificates
* Total gallery images
* Total testimonials
* Total FAQs
* Active policy pages
* Recent enquiries
* Quick links to common settings

### Homepage Slider Management

Functions:

* Add
* Edit
* Delete
* Enable or disable
* Reorder
* Desktop image
* Mobile image
* Content and button management

### Website Settings

Create separate tabs:

#### General Settings

* Jewellery shop name
* Tagline
* Establishment year
* Short description
* Full description
* Email
* Primary phone
* Alternate phone
* WhatsApp number
* Complete address
* Business hours
* GST number
* BIS registration details
* Google Maps embed
* Google Maps direction URL

#### Logo and Branding

Allow upload of:

* Main logo
* White logo
* Dark logo
* Favicon
* Footer logo
* App promotional image

#### Theme Settings

Use three configurable colours:

1. Primary colour
2. Secondary colour
3. Accent colour

Also allow:

* Heading colour
* Body text colour
* Light background colour
* Dark footer colour
* Button border radius
* Card border radius
* Optional font family selection

Use CSS variables so colours change throughout the website automatically.

Example:

```css
:root {
    --primary-color: #7a1538;
    --secondary-color: #d4af37;
    --accent-color: #f6eee3;
    --heading-color: #22171b;
    --text-color: #60545a;
}
```

Recommended default jewellery theme:

* Primary: Deep maroon
* Secondary: Premium gold
* Accent: Warm ivory
* Heading: Dark charcoal
* Text: Muted dark grey

Do not allow random colours to reduce readability. Add colour pickers with text inputs for HEX codes.

Validate all colour values before saving.

#### Mobile App Settings

* Android Play Store URL
* Apple App Store URL
* Android QR code
* iOS QR code
* App name
* App short description
* App promotional heading
* Android app enabled or disabled
* iOS app enabled or disabled
* App screenshot gallery

#### Social Media Settings

* Facebook
* Instagram
* YouTube
* LinkedIn
* X or Twitter
* Pinterest

#### SEO Settings

* Default meta title
* Default meta description
* Meta keywords
* Open Graph image
* Google Analytics ID
* Google Search Console verification code
* Facebook Pixel ID
* Canonical base URL

### About Shop Management

Admin should manage:

* Heading
* Subheading
* Full content
* Images
* Years of experience
* Trust points
* Mission
* Vision
* Shop history

### Gold Scheme Content Management

Admin should manage:

* Page heading
* Introduction
* How it works
* Scheme benefits
* Eligibility
* Payment process
* Maturity process
* Redemption process
* Terms
* Disclaimer
* Call-to-action text
* App download links

Use a secure rich-text editor.

### Policy Page Management

Build a reusable dynamic pages module.

Admin must be able to create and edit pages such as:

* Privacy Policy
* Terms and Conditions
* Shipping Policy
* Return Policy
* Refund Policy
* Jewellery Care Policy
* Disclaimer
* Custom pages

Fields:

* Page title
* Slug
* Page content
* Meta title
* Meta description
* Featured image
* Published or draft status
* Show in footer
* Sort order
* Created date
* Updated date

Slugs must be unique.

### Certificates Management

Include all certificate features described above.

### Gallery Management

Fields:

* Title
* Category
* Image
* Description
* Sort order
* Active status

### Jewellery Category Management

Fields:

* Category name
* Slug
* Image
* Description
* Sort order
* Active status

### Testimonials Management

Include add, edit, delete, activate, deactivate, and reorder functions.

### FAQ Management

Include:

* Question
* Answer
* Category
* Sort order
* Active status

### Contact Enquiry Management

Admin should be able to:

* View enquiry
* Search enquiries
* Filter by status
* Change status
* Add internal note
* Delete enquiry
* Export enquiries to CSV

### Announcement Bar Management

Allow content, colours, link, and status configuration.

### Menu Management

Create a basic menu manager.

Admin can:

* Enable or disable menu items
* Change menu label
* Change sort order
* Add dynamic page links
* Open link in same or new tab

## Image Upload and AVIF Conversion

This requirement is very important.

Whenever the admin uploads a JPG, JPEG, PNG, or WebP image, automatically:

1. Validate the file type
2. Validate the actual MIME type
3. Validate the image dimensions
4. Generate a secure random filename
5. Remove unsafe original filenames
6. Correct image orientation where possible
7. Resize extremely large images
8. Compress and optimize the image
9. Convert it to AVIF
10. Store only the optimized AVIF version where possible
11. Save the final AVIF path in the database
12. Delete temporary and original files after successful conversion

Use PHP GD or Imagick depending on server availability.

Create a reusable image service or helper such as:

`application/libraries/Image_optimizer.php`

The system should:

* Check whether Imagick supports AVIF
* Otherwise check whether GD supports AVIF
* Show a clear admin error when the server cannot create AVIF
* Optionally fall back to WebP only when AVIF support is unavailable
* Never rename a JPG file to `.avif` without actual conversion
* Preserve transparency where supported
* Prevent animated or malicious uploads
* Set reasonable maximum file size limits
* Generate thumbnails where needed

Use separate upload directories such as:

* `uploads/logo/`
* `uploads/sliders/`
* `uploads/gallery/`
* `uploads/certificates/`
* `uploads/testimonials/`
* `uploads/categories/`
* `uploads/app/`
* `uploads/pages/`

Add `.htaccess` protection in upload folders to prevent PHP or script execution.

PDF certificate files should not be converted to AVIF.

## Image Sizes

Use appropriate image resizing:

* Logo: maximum 800 × 400
* Favicon: 256 × 256
* Desktop slider: approximately 1920 × 850
* Mobile slider: approximately 900 × 1200
* Gallery image: maximum 1600 × 1600
* Certificate thumbnail: approximately 800 × 1000
* Testimonial photo: approximately 400 × 400
* Category image: approximately 800 × 800
* App screenshot: retain mobile ratio with maximum height control

Do not distort images. Use crop or contain options based on image purpose.

## UI and UX Requirements

The frontend must feel premium and jewellery-focused.

Design direction:

* Elegant typography
* Large clean spacing
* Deep maroon, gold, ivory, charcoal, or brand-selected colours
* Soft shadows
* Fine borders
* High-quality cards
* Premium hover effects
* Smooth transitions
* Subtle animations
* Clear app-download call-to-actions
* Strong trust indicators
* Consistent button styles
* No excessive gradients
* No excessive gold colour
* No clutter
* No tiny text
* No generic cheap Bootstrap template appearance

Use realistic sample jewellery content and placeholders.

Make the layout fully responsive for:

* Mobile phones
* Tablets
* Laptops
* Large desktop screens

Pay special attention to:

* Mobile navigation
* Slider text readability
* App download buttons
* QR code positioning
* Certificate cards
* Policy page readability
* Contact buttons
* Forms
* Floating actions
* Footer layout

## Performance Requirements

The website must load quickly.

Implement:

* AVIF image optimization
* Lazy loading
* Responsive images
* Minimized unnecessary JavaScript
* Deferred scripts
* Optimized CSS
* Browser caching
* GZIP-ready `.htaccess`
* Database indexing
* Pagination where needed
* No large unused libraries
* Proper image dimensions
* Avoid layout shifts
* Avoid autoplay background videos

Target strong Core Web Vitals and good mobile performance.

## SEO Requirements

Implement:

* Dynamic page titles
* Meta descriptions
* Canonical URLs
* Open Graph metadata
* Twitter card metadata
* Organization or LocalBusiness schema
* JewelleryStore schema where suitable
* Breadcrumb schema
* FAQ schema
* MobileApplication schema
* XML sitemap
* `robots.txt`
* Clean URLs
* Image alt attributes
* Semantic HTML
* Proper heading hierarchy
* Custom 404 page

## Security Requirements

Implement:

* CodeIgniter CSRF protection
* Form validation
* Output escaping
* XSS filtering
* SQL injection prevention using Query Builder
* Secure session handling
* Password hashing
* Protected admin routes
* MIME type validation
* Extension validation
* File size validation
* Upload folder script blocking
* Unique filenames
* Rate limiting or basic protection for login attempts
* Contact-form spam protection
* No direct access to sensitive configuration files
* No plain-text passwords
* No sensitive error display in production

## Folder and Code Structure

Follow proper CodeIgniter 3 MVC structure.

Create organized files such as:

### Controllers

* `Home.php`
* `Page.php`
* `Contact.php`
* `Certificate.php`
* `Sitemap.php`

Admin controllers:

* `admin/Auth.php`
* `admin/Dashboard.php`
* `admin/Settings.php`
* `admin/Sliders.php`
* `admin/Pages.php`
* `admin/Certificates.php`
* `admin/Gallery.php`
* `admin/Categories.php`
* `admin/Testimonials.php`
* `admin/Faqs.php`
* `admin/Enquiries.php`
* `admin/Menu.php`

### Models

Create separate models for:

* Admin
* Settings
* Sliders
* Pages
* Certificates
* Gallery
* Categories
* Testimonials
* FAQs
* Enquiries
* Menus

### Views

Use reusable frontend partials:

* Header
* Footer
* Navigation
* App download buttons
* Breadcrumb
* Flash messages
* SEO metadata

Use reusable admin partials:

* Header
* Sidebar
* Footer
* Form validation errors
* Alerts
* Image preview
* Delete confirmation

### Helpers and Libraries

Create reusable utilities for:

* Image conversion
* File upload
* Slug generation
* Settings retrieval
* SEO metadata
* Admin authentication
* Menu generation

Do not put large business logic directly inside views.

## Database Tables

Create suitable tables, including but not limited to:

* `admins`
* `website_settings`
* `theme_settings`
* `app_settings`
* `social_links`
* `seo_settings`
* `sliders`
* `pages`
* `certificates`
* `gallery_categories`
* `gallery`
* `jewellery_categories`
* `testimonials`
* `faqs`
* `contact_enquiries`
* `menus`
* `menu_items`
* `announcement_settings`
* `app_screenshots`
* `shop_trust_points`
* `scheme_steps`
* `scheme_benefits`
* `login_attempts`

Keep the database practical. Avoid unnecessary tables when a clean settings table is sufficient.

Use:

* `created_at`
* `updated_at`
* `status`
* `sort_order`

where applicable.

## Configuration

Configure:

* Base URL handling
* Autoload libraries and helpers
* Database configuration instructions
* Routes
* Session settings
* Encryption key placeholder
* CSRF protection
* Clean URL `.htaccess`
* Environment-based error handling

Do not hard-code the live domain.

## Required Deliverables

Complete the project with:

1. Fully working CodeIgniter 3 frontend
2. Fully working admin panel
3. Responsive premium UI
4. Dynamic homepage slider
5. Dynamic jewellery shop information
6. Dynamic mobile-app promotion
7. Android and iOS app links
8. Dynamic gold-saving scheme page
9. Dynamic policy pages
10. Dynamic certificate management
11. Dynamic gallery
12. Dynamic testimonials
13. Dynamic FAQs
14. Dynamic contact enquiries
15. Dynamic theme colours
16. Dynamic logo and favicon
17. Automatic AVIF image conversion
18. Secure admin authentication
19. Complete SQL file named `gold_landing_page.sql`
20. `.htaccess` for clean URLs
21. Upload-folder security
22. SEO setup
23. Sample data
24. Installation instructions in `README.md`

## README Instructions

Create a clear `README.md` covering:

* Project requirements
* PHP version
* MySQL version
* Required PHP extensions
* AVIF support requirements
* Database import steps
* Database configuration
* Base URL configuration
* Upload folder permissions
* Default admin login
* Production security steps
* How to change the admin password
* How to verify whether Imagick or GD supports AVIF
* How to configure the project on cPanel

## Final Development Instructions

First inspect the existing blank CodeIgniter 3 folder and preserve its standard structure.

Then:

1. Plan the complete folder structure
2. Create the database schema
3. Create frontend routes
4. Create admin authentication
5. Build the admin layout
6. Build settings and theme management
7. Build all CMS modules
8. Build the public landing page
9. Add image optimization and AVIF conversion
10. Add security protections
11. Add sample content
12. Test all CRUD operations
13. Test mobile responsiveness
14. Test clean URLs
15. Test file uploads
16. Test invalid uploads
17. Test theme colour changes
18. Test policy page generation
19. Test admin session protection
20. Create the final README

Do not leave incomplete buttons, dummy links, broken forms, placeholder controllers, TODO comments, or non-functional modules.

Use proper validation, error messages, success messages, confirmation dialogs, empty-state screens, loading states, image previews, and responsive tables throughout the admin panel.

The final result should be production-ready, cleanly coded, easy to maintain, and visually premium.
