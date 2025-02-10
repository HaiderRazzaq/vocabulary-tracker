# Vocabulary Tracker

Vocabulary Tracker is a web application designed to help users efficiently manage and enhance their vocabulary. Built with Laravel, it offers a user-friendly interface to add, track, and review new words, facilitating effective language learning.

## Features

- **Add New Words**: Easily input new vocabulary words along with their definitions and example sentences.
- **Add Arabic Meaning Words**: Easily input new vocabulary words with arabic .
- **Examples sentences**: Organize words into many examples sentences for structured learning.

## Installation

To set up the Vocabulary Tracker application locally, follow these steps:

1. **Clone the Repository**:

   ```bash
   git clone https://github.com/HaiderRazzaq/vocabulary-tracker.git
   cd vocabulary-tracker
   ```

2. **Install Dependencies**:

   Ensure you have [Composer](https://getcomposer.org/) installed. Then, run:

   ```bash
   composer install
   ```

3. **Environment Configuration**:

   Duplicate the `.env.example` file and rename the copy to `.env`. Open the `.env` file and configure the following settings:

   - **Database Settings**: Set your database connection details (DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD).

4. **Generate Application Key**:

   ```bash
   php artisan key:generate
   ```

5. **Run Migrations**:

   ```bash
   php artisan migrate
   ```

6. **Start the Development Server**:

   ```bash
   php artisan serve
   ```

   Access the application at [http://localhost:8000](http://localhost:8000).
   or using it in laragon


## License

This project is open-source and available under the [MIT License](LICENSE).

---

For any questions or support, please open an issue in this repository. 
