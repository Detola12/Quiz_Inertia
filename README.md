<h2>Quiz Application</h2>

A web-based quiz application built with Laravel and Inertia Js.
Inertia.js provides a modern, seamless integration between Laravel (backend) and Vue.js (frontend), without the need for an API. 
The application allows users to participate in quizzes and view their scores.

<b>Features</b>
<ul>
    <li>User Authentication: Users can register and log in.</li>
    <li>Quiz Management: Admins can create, update, and delete quizzes.</li>
    <li>Multiple Choice Questions: Each quiz can have multiple questions with predefined answers.</li>
    <li>Scoring System: Users are scored based on correct answers.</li>
    <li>Real-time Feedback: Users can see their quiz results immediately after submission.</li>
    <li>Responsive UI: The application works on both desktop and mobile devices.</li>
</ul>
Technologies Used
<ul>
    <li>Backend: Laravel 11</li>
    <li>Frontend: Vue.js 3</li>
    <li>Database: MySQL</li>
    <li>Authentication: Laravel Breeze</li>
    <li>Styling: Tailwind CSS</li>
</ul>
<h4>Installation: </h4>
Ensure that you have the following installed on your local machine:

    PHP 8.2^
    Composer
    Node.js & npm
    MySQL

<h4>Setup</h4>
1. Clone the repository :
   git clone https://github.com/Detola12/Quiz_Inertia.git
2. Install PHP Dependencies : 
    composer install
3. Create an .env file :
   cp .env.example .env
4. Generate an application key :
   php artisan key:generate
5. Configure your database in the .env file
6. Run migrations to set up the database:
    php artisan migrate
7. Install JavaScript dependencies:
    npm install
8. Compile the frontend assets:
    npm run dev
9. Start the Laravel development server:
    php artisan serve
