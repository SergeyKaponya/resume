# Resume Analyzer

Resume Analyzer is a web application that helps users improve their resumes by analyzing the text and providing recommendations for improvement. It uses OpenAI's GPT-based language model, ChatGPT, to generate the suggestions.

## Features

- Paste resume text into the input field
- Click "Analyze" to receive recommendations for improvement
- Responsive UI with UIKit

## Installation

1. Clone the repository to your local machine or server:

git clone git@github.com:SergeyKaponya/resume.git


2. Change into the project directory:

cd resume-analyzer


3. Install the required PHP packages using [Composer](https://getcomposer.org/):

composer install


4. Copy the `.env.example` file to `.env`:

cp .env.example .env


5. Update the `.env` file with your OpenAI API key:

OPENAI_API_KEY=your_api_key_here


6. Set up your web server to serve the contents of the project directory, ensuring that the `index.php` file is used as the entry point.

7. Visit the web application in your browser and start analyzing resumes.

## Built With

- [UIKit](https://getuikit.com/) - A lightweight and modular front-end framework
- [OpenAI API](https://beta.openai.com/docs/) - Access to the GPT-based language model, ChatGPT

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
