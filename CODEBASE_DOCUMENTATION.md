# 📚 PassNowNow - Complete Codebase Documentation

## 🎯 Application Overview

**PassNowNow** is a **Laravel 11** educational platform designed for exam preparation and self-study in Nigeria. It provides students with access to class notes, past questions, and collaborative learning features.

**Target Audience:** Nigerian students preparing for JSSCE, SSCE, JAMB/UTME examinations.

---

## 🏗️ Technical Architecture

### Backend Stack
- **Framework**: Laravel 11 (PHP 8.2+)
- **Authentication**: Laravel Breeze + Sanctum
- **Payment Gateway**: Paystack (via unicodeveloper/laravel-paystack)
- **Theming**: Laravel Themer (qirolab/laravel-themer)
- **Database**: MySQL
- **Session Storage**: Database-driven

### Frontend Stack
- **Build Tool**: Vite
- **CSS Framework**: Bootstrap 5.3.7
- **JavaScript**: jQuery 3.7.1, Axios
- **Styling**: SASS/SCSS

---

## 📊 Database Schema

### Core Tables

#### 1. **users** - Unified table for all user types
```
- id (primary key)
- unique_id (unique identifier)
- first_name, last_name
- username (unique)
- email (unique)
- email_verified_at
- password (hashed)
- role (user/admin/sadmin)
- terms (acceptance flag)
- profile_photo
- school_id (foreign key, nullable)
- mobile_no, exam
- remember_token
- timestamps
```

#### 2. **classes** - Educational classes (e.g., JSS1, SS3)
```
- id
- unique_id
- user_unique_id (creator)
- title
- description
- timestamps
```

#### 3. **subjects** - Subjects within classes
```
- id
- unique_id
- user_unique_id (creator)
- title
- description
- class_unique_id (foreign reference)
- avatar (image path)
- timestamps
```

#### 4. **topics** - Learning content within subjects
```
- id
- unique_id
- user_unique_id (creator)
- title
- content (rich text)
- url (external link)
- content_type (enum: 'url' or 'content')
- subject_unique_id (foreign reference)
- term (academic term)
- order (display order)
- timestamps
```

#### 5. **exams** - Exam types (WAEC, JAMB, NECO, etc.)
```
- id
- unique_id
- title
- description
- avatar (image path)
- status (active/inactive)
- timestamps
```

#### 6. **questions** - Past questions
```
- id
- unique_id
- user_unique_id (creator)
- title
- description
- year (exam year)
- url (PDF/document link)
- exam_unique_id (foreign reference)
- order (display order)
- timestamps
```

#### 7. **transactions** - Payment records
```
- id
- user_unique_id
- first_name, last_name
- amount
- reference (Paystack reference)
- email, phone
- currency (NGN)
- orderID
- services (service type)
- plan_name (subscription plan)
- active_status
- payment_status (pending/success/failed)
- payment_method (card/bank/etc)
- expiry_date (subscription expiry)
- timestamps
```

#### 8. **carddetails** - Saved payment cards
```
- id
- user_unique_id
- authorization_code (Paystack auth code)
- bin, last4
- exp_month, exp_year
- channel, card_type
- bank, country_code
- brand
- reusable (boolean)
- signature
- timestamps
```

#### 9. **pays** - Alternative payment table
```
- id
- order_id
- first_name, last_name
- amount, reference
- email, phone
- currency
- plan
- active_status
- payment_status
- payment_method
- timestamps
```

### Advanced Features Tables (Future/Planned)
- **schools** - Multi-school support
- **roles** - Role definitions
- **permissions** - Permission system




I'll study the entire codebase to understand the PassNowNow application structure and functionality.

Let me continue gathering more information about the codebase structure.

Let me gather more information about specific features and configurations.

Perfect! Now I have a comprehensive understanding of the PassNowNow codebase. Let me create a detailed summary for you.

---

# 📚 PassNowNow - Complete Codebase Analysis

I've thoroughly studied your entire codebase. Here's a comprehensive breakdown:

## 🎯 **Application Overview**

**PassNowNow** is a **Laravel 11** educational platform designed for exam preparation and self-study in Nigeria. It provides students with access to class notes, past questions, and collaborative learning features.

---

## 🏗️ **Technical Architecture**

### **Backend Stack**
- **Framework**: Laravel 11 (PHP 8.2+)
- **Authentication**: Laravel Breeze + Sanctum
- **Payment Gateway**: Paystack (via unicodeveloper/laravel-paystack)
- **Theming**: Laravel Themer (qirolab/laravel-themer)
- **Database**: MySQL
- **Session Storage**: Database-driven

### **Frontend Stack**
- **Build Tool**: Vite
- **CSS Framework**: Bootstrap 5.3.7
- **JavaScript**: jQuery 3.7.1, Axios
- **Styling**: SASS/SCSS

---

## 📊 **Database Schema**

### **Core Tables**

1. **users** - Unified table for all user types
   - `unique_id`, `first_name`, `last_name`, `username`, `email`
   - `role` (user/admin/sadmin), `email_verified_at`, `password`
   - `school_id`, `mobile_no`, `exam`, `profile_photo`

2. **classes** - Educational classes (e.g., JSS1, SS3)
   - `unique_id`, `title`, `description`, `user_unique_id`

3. **subjects** - Subjects within classes
   - `unique_id`, `title`, `description`, `class_unique_id`, `avatar`

4. **topics** - Learning content within subjects
   - `unique_id`, `title`, `content`, `url`, `content_type` (url/content)
   - `subject_unique_id`, `term`, `order`

5. **exams** - Exam types (WAEC, JAMB, NECO, etc.)
   - `unique_id`, `title`, `description`, `avatar`, `status`

6. **questions** - Past questions
   - `unique_id`, `title`, `description`, `year`, `url`
   - `exam_unique_id`, `order`

7. **transactions** - Payment records
   - `user_unique_id`, `first_name`, `last_name`, `amount`
   - `reference`, `plan_name`, `payment_status`, `payment_method`
   - `expiry_date`, `orderID`, `services`

8. **carddetails** - Saved payment cards
   - `user_unique_id`, `authorization_code`, `bin`, `last4`
   - Card metadata for recurring payments

### **Advanced Features Tables** (Future/Planned)
- `schools`, `roles`, `permissions`, `badges`, `leaderboards`
- `streaks`, `learning_stats`, `assignments`, `gradebooks`
- `chat_sessions`, `chat_messages`, `threads`, `events`

---

## 🎭 **User Roles & Authentication**

### **Role Types**
1. **user** - Regular students
2. **admin** - Content managers
3. **sadmin** - Super administrators

### **Authentication Features**
- Email/Username login (flexible authentication)
- Email verification required (MustVerifyEmail)
- Password reset functionality
- Session-based authentication
- Subscription status checking on login

### **Key Auth Controllers**
- `RegisteredUserController` - Student registration
- `RegisteredAdminController` - Admin registration
- `AuthenticatedSessionController` - Login with subscription validation
- `VerifyEmailController` - Email verification

---

## 💳 **Payment & Subscription System**

### **Subscription Plans**
- **Daily Plan**: ₦300 (24 hours)
- **Weekly Plan**: ₦500 (7 days)
- **Monthly Plan**: ₦1,500 (30 days)
- **Yearly Plan**: ₦10,000 (365 days)

### **Payment Flow**
1. User selects plan → `PaymentController::redirectToGateway()`
2. Creates transaction record with "pending" status
3. Redirects to Paystack payment page
4. Paystack callback → `PaymentController::handleGatewayCallback()`
5. Updates transaction status and user subscription
6. Activates user account (`status = 1`)

### **Payment Controllers**
- `PaymentController` - Main subscription payments (authenticated users)
- `PayController` - Guest/public payments

---

## 🎓 **Core Features**

### **1. Class Notes System**
- Hierarchical structure: Classes → Subjects → Topics
- Topics support two content types:
  - **URL**: External links to resources
  - **Content**: Rich text content (CKEditor)
- Organized by term and order
- Image avatars for visual identification

### **2. Past Questions System**
- Organized by exam type (WAEC, JAMB, NECO, etc.)
- Questions grouped by year
- PDF/URL links to question papers
- Ordered display for easy navigation

### **3. Admin Dashboard**
- User management (view, edit, delete)
- Content management (classes, subjects, topics, exams, questions)
- Sales analytics and statistics
- Subscription history tracking
- Order management

### **4. Student Dashboard**
- Subscription status display
- Access to class notes
- Access to past questions
- Subscription history
- Profile management

---

## 🗂️ **Key Controllers**

1. **AdminController** - Admin/user CRUD operations
2. **ClassesController** - Class management
3. **SubjectsController** - Subject management
4. **TopicsController** - Topic/content management
5. **ExamsController** - Exam type management
6. **QuestionsController** - Past questions management
7. **PaymentController** - Subscription payments
8. **ChartDataController** - Analytics and statistics
9. **SubscriptionController** - Email subscription handling
10. **ProfileController** - User profile management

---

## 🛣️ **Routing Structure**

### **Public Routes**
- `/` - Homepage with exams and classes
- `/about`, `/contact`, `/faq` - Informational pages
- `/subscription` - Subscription plans
- `/login`, `/register` - Authentication

### **Authenticated Routes** (middleware: auth)
- `/dashboard` - Main dashboard (role-based)
- `/classes` - Class listing
- `/subject/{data}/view` - Subject view
- `/viewtopics/{data}/view` - Topics view
- `/learning/{data}/view` - Learning interface
- `/adexams` - Exams management
- `/showpastquestions/{data}/view` - Past questions view
- `/checkoutdetails` - Subscription checkout
- `/subscriptiondetails` - Subscription info

### **Admin-Only Routes**
- `/admins` - Admin management (sadmin only)
- `/users` - User management
- `/adsubjects` - Subject management
- `/detailedstat` - Detailed statistics
- `/totalsales` - Sales analysis

---

## 🎨 **Frontend Views Structure**

### **Layouts**
- `layouts/index.blade.php` - Public layout
- `layouts/dasboardtemp.blade.php` - Dashboard layout
- `layouts/guest.blade.php` - Authentication layout
- `layouts/learninterface.blade.php` - Learning interface
- `layouts/pqinterface.blade.php` - Past questions interface

### **Admin Views**
- Dashboard, users, admins, classes, subjects, topics
- Exams, past questions, orders, statistics
- Subscription management

### **Auth Views**
- Login, register, forgot password, reset password
- Email verification, confirm password

---

## 🔧 **Key Features & Logic**

### **Subscription Validation**
- On login, checks if user's subscription has expired
- Compares `expiry_date` with current date
- Updates user `status` to 0 if expired
- Prevents access to premium content

### **Content Organization**
- Unique IDs for all entities (not database IDs)
- User tracking via `user_unique_id`
- Hierarchical relationships maintained via unique IDs

### **File Uploads**
- Images stored in `storage/app/upload`
- Accessed via `storage/` symlink
- Validation: jpeg, jpg, png (max 2MB)

### **Email System**
- Email verification for new users
- Password reset emails
- Subscription notification emails
- Newsletter subscription

---

## 📦 **Dependencies**

### **PHP Packages**
- `laravel/framework: ^11.9`
- `laravel/sanctum: ^4.0` - API authentication
- `laravel/breeze: ^2.2` - Authentication scaffolding
- `unicodeveloper/laravel-paystack: ^1.2` - Payment integration
- `qirolab/laravel-themer: ^2.4` - Theme management

### **JavaScript Packages**
- `bootstrap: ^5.3.7`
- `jquery: ^3.7.1`
- `axios: ^1.10.0`
- `vite: ^5.4.10`

---

## 🚀 **Deployment Configuration**

- **Environment**: Production/Local
- **Database**: MySQL (passnownowapp)
- **Session**: Database-driven
- **Queue**: Database
- **Cache**: Database
- **File Storage**: Local disk
- **Mail**: Configurable (log for dev)

---

## 🔐 **Security Features**

- CSRF protection on all forms
- Password hashing (bcrypt)
- Email verification required
- Rate limiting on login/verification
- Signed URLs for email verification
- Session regeneration on login
- Middleware-based access control

---

## 📈 **Analytics & Reporting**

- Total users count
- Total admins count
- Total revenue (sum of successful transactions)
- Total orders count
- Subscription history per user
- Sales analysis charts
- Detailed statistics dashboard

---

## 🎯 **Business Model**

**Revenue Streams:**
1. Subscription fees (daily, weekly, monthly, yearly)
2. Access to premium content (class notes + past questions)

**Target Audience:**
- Nigerian students preparing for:
  - JSSCE (Junior Secondary School Certificate Examination)
  - SSCE (Senior Secondary Certificate Examination)
  - JAMB/UTME (University entrance exams)

**Value Proposition:**
- Comprehensive past questions database
- Organized class notes by subject and topic
- Affordable subscription plans
- Self-paced learning platform

---

## 🔮 **Future Features** (Based on Migrations)

The codebase has migrations for advanced features not yet fully implemented:
- **Gamification**: Badges, XP, leaderboards, streaks
- **School Management**: Multi-school support
- **Role-Based Permissions**: Granular access control
- **Collaborative Learning**: Chat, threads, forums
- **Assignment System**: Submissions, grading
- **Event Calendar**: Exams, classes, reminders
- **Attendance Tracking**: Student attendance logs

---

This is a well-structured educational platform with solid foundations for growth. The codebase follows Laravel best practices and has room for the advanced features already planned in the database schema. 🎓✨


