# UserController and PostController Overview

This document provides a detailed explanation of the functionality and methods implemented in the `UserController` and `PostController` classes in the project.

---

## UserController

The `UserController` handles user-related operations, such as creating, retrieving, updating, and deleting users.

### Methods:

#### 1. **index()**
- **Purpose**: Displays a paginated and searchable list of users.
- **Features**:
  - Pagination: Users can be displayed in chunks (default: 10 per page).
  - Search: Filters users based on `firstname`, `lastname`, or `email`.
  - Sorting: Allows sorting by fields like `updated_at` in ascending or descending order.
- **View**: `users/index`

---

#### 2. **show($id)**
- **Purpose**: Displays details of a specific user.
- **Parameters**: `$id` - ID of the user.
- **View**: `users/show`

---

#### 3. **create()**
- **Purpose**: Displays the form for creating a new user.
- **View**: `users/create`

---

#### 4. **store()**
- **Purpose**: Handles the creation of a new user.
- **Features**:
  - Input Validation: Ensures all required fields (e.g., `firstname`, `lastname`, `email`, `avatar`) are provided.
  - File Upload: Uploads the user's avatar to the `avatars` directory.
  - Status: Assigns the user a status of `active` or `inactive`.
  - Error Handling: Returns validation errors or file upload errors if any.
- **Redirect**: Redirects to `/users` on success.

---

#### 5. **edit($id)**
- **Purpose**: Displays the edit form for a specific user.
- **Parameters**: `$id` - ID of the user.
- **View**: `users/edit`

---

#### 6. **update($id)**
- **Purpose**: Updates a specific user's data.
- **Features**:
  - Input Validation: Validates fields like `firstname`, `lastname`, and `email`.
  - File Update: Allows updating the user's avatar, replacing the old one if necessary.
  - Error Handling: Returns validation errors or file upload errors if any.
- **Redirect**: Redirects to `/users` with a success message.

---

#### 7. **delete($id)**
- **Purpose**: Deletes a specific user from the database.
- **Parameters**: `$id` - ID of the user.
- **Redirect**: Redirects to `/users` with a success message.

---

## PostController

The `PostController` handles operations related to posts, including creating, retrieving, updating, and deleting posts.

### Methods:

#### 1. **index()**
- **Purpose**: Displays a paginated and searchable list of posts.
- **Features**:
  - Pagination: Posts are displayed in chunks (default: 10 per page).
  - Search: Filters posts based on `title`, `content`, or the associated user's `firstname` or `lastname`.
  - Sorting: Allows sorting by fields like `updated_at` in ascending or descending order.
- **View**: `posts/index`

---

#### 2. **show($id)**
- **Purpose**: Displays details of a specific post.
- **Parameters**: `$id` - ID of the post.
- **Features**:
  - Joins with the `users` table to fetch the post's author details.
- **View**: `posts/show`

---

#### 3. **create()**
- **Purpose**: Displays the form for creating a new post.
- **Features**:
  - Fetches a list of all users to associate a user with the post.
- **View**: `posts/create`

---

#### 4. **store()**
- **Purpose**: Handles the creation of a new post.
- **Features**:
  - Input Validation: Ensures all required fields (e.g., `title`, `content`, `image`, `user_id`) are provided.
  - File Upload: Uploads the post's image to the `images` directory.
  - Status: Assigns the post a status of `active` or `inactive`.
  - Error Handling: Returns validation errors or file upload errors if any.
- **Redirect**: Redirects to `/posts` on success.

---

#### 5. **edit($id)**
- **Purpose**: Displays the edit form for a specific post.
- **Parameters**: `$id` - ID of the post.
- **View**: `posts/edit`

---

#### 6. **update($id)**
- **Purpose**: Updates a specific post's data.
- **Features**:
  - Input Validation: Validates fields like `title` and `content`.
  - File Update: Allows updating the post's image, replacing the old one if necessary.
  - Error Handling: Returns validation errors or file upload errors if any.
- **Redirect**: Redirects to `/posts` with a success message.

---

#### 7. **delete($id)**
- **Purpose**: Deletes a specific post from the database.
- **Parameters**: `$id` - ID of the post.
- **Redirect**: Redirects to `/posts` with a success message.

---

## Common Features

1. **Validation**:
   - Both controllers use validation rules to ensure data integrity.

2. **File Upload**:
   - Both controllers use the `FileUploadService` to handle file uploads and updates for avatars (users) and images (posts).

3. **Status Management**:
   - Both controllers allow toggling between `active` and `inactive` statuses for users and posts.

4. **Error Handling**:
   - Validation errors and file upload errors are properly handled and passed back to the user for correction.

---

This document serves as a guide to understand the implementation of the `UserController` and `PostController` in the project. Each method is designed to handle specific functionality and follows the CodeIgniter framework's best practices.