# Admin Panel Guide

## Overview
The admin panel provides comprehensive management of passport applications with dashboard analytics, order filtering, and bulk operations.

## Accessing the Admin Panel

### URLs
- **Dashboard**: `http://localhost/Passport/Passport/public/admin/dashboard`
- **Orders Management**: `http://localhost/Passport/Passport/public/admin/orders`
- **Site Settings**: `http://localhost/Passport/Passport/public/admin/settings`

## Features

### 1. Dashboard (`/admin/dashboard`)
The dashboard provides real-time analytics and insights:

#### Statistics Cards
- **Today's Applications**: Total, pending, successful, and completed counts
- **Yesterday's Comparison**: Compare with previous day's performance
- **All-Time Statistics**: Lifetime application metrics

#### Charts & Graphs
1. **7-Day Trend Line Chart**: Shows application trends over the last 7 days
   - Pending (yellow line)
   - Abandoned (red line)
   - Successful (green line)
   - Completed (blue line)

2. **Application Types Doughnut Chart**: Breakdown by passport type
   - New Passport
   - Renewal Passport
   - Lost Passport
   - Child Passport
   - Damage Passport

3. **Status Distribution Bar Chart**: Current status overview
   - Pending, Abandoned, Successful, Completed

#### Recent Applications Table
- Displays the 10 most recent applications
- Shows applicant name, email, type, status, and date
- Quick access to view details

### 2. Orders Management (`/admin/orders`)

#### Status Filtering
Click on status badges to filter:
- **All**: View all applications
- **Pending**: Applications awaiting processing
- **Abandoned**: Incomplete or cancelled applications
- **Successful**: Approved applications
- **Completed**: Fully processed applications

#### Advanced Filters
Click "Show Filters" to access:
- **Search**: Search by name or email
- **Application Type**: Filter by passport type
- **Date Range**: Filter by submission date (from/to)
- **Apply Filters** button to execute search
- **Reset** button to clear all filters

#### Bulk Operations
1. Select multiple applications using checkboxes
2. Click "Select All" to choose all visible applications
3. Use "Delete Selected" to remove multiple applications
4. Confirmation modal prevents accidental deletion

#### Individual Actions
Each row provides:
- **View**: See complete application details
- **Delete**: Remove single application (with confirmation)

#### Export Functionality
- **Export to CSV** button downloads filtered results
- Includes all current filters in export

### 3. Order Details (`/admin/orders/{id}`)

#### Status Update
- Large status dropdown at the top
- Change status: Pending → Abandoned/Successful/Completed
- Click "Update Status" to save

#### Information Sections

**Personal Information**
- Full name, gender, date of birth
- Physical characteristics (height, hair color, eye color)
- Birth location (country, state, city)
- Employment status

**Contact Information**
- Primary phone number (clickable to call)
- Physical address
- Mailing address (if different)

**Passport Details**
- Current passport information
- Book number, issue date, expiry date
- Passport card details (if applicable)

**Emergency Contact**
- Contact person's full details
- Relationship to applicant
- Phone and email (clickable links)
- Address

**Travel Plans**
- Departure and return dates
- Destination countries
- Shows "No immediate travel plans" if none

**Quick Information Sidebar**
- Application type badge
- Current status badge
- Email address (clickable)
- Submission timestamp
- Last update timestamp

**Actions Panel**
- Send Email: Opens email client
- Call Applicant: Initiates phone call
- Delete Application: Remove with confirmation

### 4. Site Settings (`/admin/settings`)
Manage dynamic site content (see SETTINGS_GUIDE.md for details)

## Sample Data

### Generated Applications
The seeder creates 50 realistic applications with:
- Random names from 20 first names and 20 last names
- Realistic addresses across major US states
- Valid phone numbers and email addresses
- Distributed application types
- Status distribution based on realistic timelines:
  - **Completed**: 10-90 days old
  - **Successful**: 5-20 days old  
  - **Pending**: 1-7 days old
  - **Abandoned**: 15-60 days old

### Regenerating Sample Data
```bash
# Clear existing applications (optional)
php artisan migrate:fresh --seed

# Or just run the seeder again (adds 50 more)
php artisan db:seed --class=PassportApplicationSeeder
```

## Technical Details

### Status Workflow
```
Pending → Successful → Completed
       ↘ Abandoned
```

### Application Types
- `new-passport`: First-time application
- `renewal-passport`: Renewing existing passport
- `lost-passport`: Lost passport replacement
- `child-passport`: Passport for minor
- `damage-passport`: Damaged passport replacement

### Database Tables
1. `tblpersonalinfos` (main order table)
2. `tblcontactinfos` (foreign key: order_id)
3. `tblpassportdetails` (foreign key: order_id)
4. `tblemergencycontacts` (foreign key: order_id)
5. `tbltravelplans` (foreign key: order_id)
6. `tblverifications` (foreign key: order_id)

All related records are deleted automatically when an application is removed (cascade delete).

### CSV Export Format
Exported files include:
- Application ID
- Applicant name and email
- Application type
- Status
- Submission date
- All filters applied during export

## Troubleshooting

### Issue: Can't see dashboard
**Solution**: Make sure you're accessing the correct URL with `/admin/dashboard`

### Issue: Charts not displaying
**Solution**: 
1. Check browser console for JavaScript errors
2. Ensure Chart.js CDN is accessible
3. Verify data is being passed from controller

### Issue: Filters not working
**Solution**:
1. Click "Apply Filters" button after selecting filters
2. Check if query strings are in URL
3. Use "Reset" to clear and try again

### Issue: Bulk delete not working
**Solution**:
1. Ensure checkboxes are selected
2. Check browser console for errors
3. Verify CSRF token is present

### Issue: Status update fails
**Solution**:
1. Verify application exists
2. Check validation rules in AdminController
3. Ensure proper HTTP method (PATCH)

## Keyboard Shortcuts & Tips

### Efficient Navigation
1. Use browser back button to return from details page
2. Breadcrumb navigation at top of details page
3. "Back to Orders" button on details page

### Quick Filtering
1. Click status badges for instant filtering
2. Use browser's built-in search (Ctrl+F) to find on page
3. Sort columns by clicking headers (if sortable)

### Best Practices
1. Regularly review pending applications
2. Archive completed applications periodically
3. Use date filters for reporting
4. Export data before bulk deletions
5. Update status as applications progress

## Design Features

### Color Scheme
- **Primary**: Purple gradient (#667eea to #764ba2)
- **Pending**: Yellow/Warning
- **Successful**: Green
- **Completed**: Blue/Info
- **Abandoned**: Red/Danger

### Responsive Design
- Mobile-friendly sidebar toggle
- Collapsible filter panels
- Responsive tables with horizontal scroll
- Touch-friendly buttons and actions

### User Experience
- Confirmation modals for destructive actions
- Loading states for async operations
- Success/error toast messages
- Avatar circles with initials
- Badge indicators for status
- Clickable email and phone links

## Future Enhancements (Suggested)

1. **Authentication**: Add login system for admin access
2. **Permissions**: Role-based access control
3. **Email Notifications**: Auto-send status updates
4. **File Management**: View uploaded documents
5. **Application Timeline**: Track status change history
6. **Advanced Search**: Full-text search across all fields
7. **Batch Status Update**: Update multiple statuses at once
8. **Comments/Notes**: Add internal notes to applications
9. **Print/PDF**: Generate printable application forms
10. **API Integration**: Connect with passport processing services

## Support

For issues or questions:
1. Check this guide first
2. Review SETTINGS_GUIDE.md for settings management
3. See SITE_SETTINGS_TROUBLESHOOTING.md for cache issues
4. Check Laravel logs in `storage/logs/laravel.log`
5. Verify database migrations are up to date: `php artisan migrate:status`
