# Fotoalbum-Backend

Fotoalbum-Backend is a comprehensive photo management application built with Laravel. This project provides a robust administrative dashboard and a public site for publishing and viewing photos. The administrative area is exclusively accessible to the administrator and includes functionalities for managing all aspects of the photos.

## Features

### Administrative Dashboard (Admin-Only)
- **View List of All Photos**: Display a complete list of all uploaded photos.
- **View Photo Details**: Inspect detailed information of each photo.
- **Add New Photo**: Upload and add a new photo to the collection.
- **Edit Existing Photo**: Update the details of an existing photo.
- **Delete Photo**: Remove an existing photo from the collection.
- **Draft Photos View**: Manage photos that are saved as drafts (not published).

### Photo Attributes
- **Title**: Name of the photo.
- **Category**: Classification of the photo.
- **Slug**: URL-friendly version of the photo title.
- **Description**: Detailed information about the photo.
- **Image Upload**: Actual image file.
- **Evidence**: Flag to mark the photo as featured.
- **Published**: Status to indicate if the photo is published or in draft.

### Entities
- **Photo**: Central entity containing all photo details.
- **Tag**: Tags that can be associated with multiple photos (many-to-many relationship).
- **Category**: Categories to classify photos (one-to-many relationship).

### API Integration
This backend project exposes various API endpoints to be consumed by the frontend application, which is built using Vue.js. The frontend repository can be found [here](https://github.com/davidequattrocchi10/fotoalbum-frontend).

## Installation

1. **Clone the Repository**
    ```bash
    git clone https://github.com/davidequattrocchi10/fotoalbum-backend.git
    cd fotoalbum-backend
    ```

2. **Install Dependencies**
    ```bash
    composer install
    npm install
    ```

3. **Environment Configuration**
    - Copy the `.env.example` to `.env` and update the environment variables accordingly.
    ```bash
    cp .env.example .env
    ```

4. **Generate Application Key**
    ```bash
    php artisan key:generate
    ```

5. **Run Migrations**
    ```bash
    php artisan migrate
    ```

6. **Serve the Application**
    ```bash
    php artisan serve
    ```

## API Endpoints

The backend provides several API endpoints for managing and viewing photos. These endpoints are consumed by the frontend application.


## Contribution

Feel free to fork this project and submit pull requests. Contributions are welcome!

## License

This project is open-sourced software licensed under the [MIT license](LICENSE).

