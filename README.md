
# Gen-Mail

Gen-Mail is a Laravel-based web application that generates marketing email copy using the Gemini AI API. It helps marketers and product owners quickly create:

- Catchy subject lines
- Engaging headlines
- Short product descriptions (max 40 words)

## Features

- Simple web form to input product name and target audience
- Integration with Google Gemini AI for content generation
- Returns results in JSON format for easy use

## How It Works

1. Enter your product name and audience in the form.
2. The app sends a prompt to Gemini AI.
3. Gemini returns a subject line, headline, and description.
4. Results are displayed on the page.

## Setup Instructions

1. Clone the repository:
	```bash
	git clone https://github.com/konawige/gen-mail.git
	cd gen-mail
	```
2. Install dependencies:
	```bash
	composer install
	npm install
	```
3. Copy `.env.example` to `.env` and set your `GEMINI_API_KEY`:
	```bash
	cp .env.example .env
	# Edit .env and add your Gemini API key
	```
4. Run migrations:
	```bash
	php artisan migrate
	```
5. Start the development server:
	```bash
	php artisan serve
	```

## Usage

Visit `http://localhost:8000` and use the form to generate marketing copy for your product.

## License

This project is open-sourced under the MIT license.
