<?php

return [
    'sections' => [
        "General Knowledge",
        "Science",
        "History",
        "Geography",
        "Mathematics",
        "Literature",
        "Technology",
        "Sports",
        "Entertainment"
    ],

    /* 'questions' => [
         [
             "section" => "General Knowledge",
             "question" => "What is the largest ocean on Earth?",
             "answers" => ["Indian Ocean", "Atlantic Ocean", "Arctic Ocean", "Pacific Ocean"],
             "correctAnswer" => "Pacific Ocean"
         ],
         [
             "section" => "General Knowledge",
             "question" => "What is the smallest country in the world by land area?",
             "answers" => ["Monaco", "Vatican City", "Malta", "Liechtenstein"],
             "correctAnswer" => "Vatican City"
         ],
         [
             "section" => "General Knowledge",
             "question" => "In which city is the Eiffel Tower located?",
             "answers" => ["London", "Rome", "Berlin", "Paris"],
             "correctAnswer" => "Paris"
         ],
         [
             "section" => "General Knowledge",
             "question" => "Who painted the Mona Lisa?",
             "answers" => ["Vincent van Gogh", "Michelangelo", "Pablo Picasso", "Leonardo da Vinci"],
             "correctAnswer" => "Leonardo da Vinci"
         ],
         [
             "section" => "General Knowledge",
             "question" => "Which is the longest river in the world?",
             "answers" => ["Nile", "Amazon", "Yangtze", "Mississippi"],
             "correctAnswer" => "Nile"
         ],
         [
             "section" => "Science",
             "question" => "What planet is known as the Red Planet?",
             "answers" => ["Venus", "Earth", "Mars", "Jupiter"],
             "correctAnswer" => "Mars"
         ],
         [
             "section" => "Science",
             "question" => "Which gas do plants primarily absorb from the atmosphere?",
             "answers" => ["Oxygen", "Nitrogen", "Carbon Dioxide", "Hydrogen"],
             "correctAnswer" => "Carbon Dioxide"
         ],
         [
             "section" => "Science",
             "question" => "What is the chemical symbol for water?",
             "answers" => ["CO2", "H2O", "O2", "NaCl"],
             "correctAnswer" => "H2O"
         ],
         [
             "section" => "Science",
             "question" => "What is the powerhouse of the cell?",
             "answers" => ["Nucleus", "Ribosome", "Mitochondria", "Chloroplast"],
             "correctAnswer" => "Mitochondria"
         ],
         [
             "section" => "Science",
             "question" => "What is the hardest natural substance on Earth?",
             "answers" => ["Gold", "Iron", "Diamond", "Steel"],
             "correctAnswer" => "Diamond"
         ],
         [
             "section" => "History",
             "question" => "Who was the first President of the United States?",
             "answers" => ["Thomas Jefferson", "Abraham Lincoln", "George Washington", "John Adams"],
             "correctAnswer" => "George Washington"
         ],
         [
             "section" => "History",
             "question" => "Which ancient civilization built the pyramids?",
             "answers" => ["Romans", "Greeks", "Egyptians", "Persians"],
             "correctAnswer" => "Egyptians"
         ],
         [
             "section" => "History",
             "question" => "What year did World War II end?",
             "answers" => ["1939", "1945", "1948", "1950"],
             "correctAnswer" => "1945"
         ],
         [
             "section" => "History",
             "question" => "Who was known as the Iron Lady?",
             "answers" => ["Angela Merkel", "Margaret Thatcher", "Hillary Clinton", "Indira Gandhi"],
             "correctAnswer" => "Margaret Thatcher"
         ],
         [
             "section" => "History",
             "question" => "Which empire was ruled by Julius Caesar?",
             "answers" => ["Byzantine Empire", "Roman Empire", "Ottoman Empire", "Persian Empire"],
             "correctAnswer" => "Roman Empire"
         ],
         [
             "section" => "Geography",
             "question" => "Which continent is the Sahara Desert located in?",
             "answers" => ["Asia", "North America", "Africa", "Australia"],
             "correctAnswer" => "Africa"
         ],
         [
             "section" => "Geography",
             "question" => "What is the capital city of Japan?",
             "answers" => ["Seoul", "Beijing", "Tokyo", "Bangkok"],
             "correctAnswer" => "Tokyo"
         ],
         [
             "section" => "Geography",
             "question" => "Which country has the most natural lakes?",
             "answers" => ["Canada", "Brazil", "Russia", "United States"],
             "correctAnswer" => "Canada"
         ],
         [
             "section" => "Geography",
             "question" => "Mount Everest is located in which mountain range?",
             "answers" => ["Rockies", "Alps", "Himalayas", "Andes"],
             "correctAnswer" => "Himalayas"
         ],
         [
             "section" => "Geography",
             "question" => "Which river flows through London?",
             "answers" => ["Thames", "Seine", "Danube", "Nile"],
             "correctAnswer" => "Thames"
         ],
         [
             "section" => "Mathematics",
             "question" => "What is the square root of 64?",
             "answers" => ["6", "7", "8", "9"],
             "correctAnswer" => "8"
         ],
         [
             "section" => "Mathematics",
             "question" => "What is the value of pi (π) to two decimal places?",
             "answers" => ["3.12", "3.14", "3.16", "3.18"],
             "correctAnswer" => "3.14"
         ],
         [
             "section" => "Mathematics",
             "question" => "What is 15% of 200?",
             "answers" => ["25", "30", "35", "40"],
             "correctAnswer" => "30"
         ],
         [
             "section" => "Mathematics",
             "question" => "What is the sum of the angles in a triangle?",
             "answers" => ["90 degrees", "180 degrees", "270 degrees", "360 degrees"],
             "correctAnswer" => "180 degrees"
         ],
         [
             "section" => "Mathematics",
             "question" => "What is 9 x 7?",
             "answers" => ["54", "56", "63", "72"],
             "correctAnswer" => "63"
         ],
         [
             "section" => "Literature",
             "question" => "Who wrote '1984'?",
             "answers" => ["George Orwell", "Aldous Huxley", "J.D. Salinger", "Ernest Hemingway"],
             "correctAnswer" => "George Orwell"
         ],
         [
             "section" => "Literature",
             "question" => "Who is the author of 'Harry Potter'?",
             "answers" => ["J.R.R. Tolkien", "J.K. Rowling", "C.S. Lewis", "Roald Dahl"],
             "correctAnswer" => "J.K. Rowling"
         ],
         [
             "section" => "Literature",
             "question" => "Who wrote 'Pride and Prejudice'?",
             "answers" => ["Charlotte Bronte", "Emily Bronte", "Jane Austen", "Mary Shelley"],
             "correctAnswer" => "Jane Austen"
         ],
         [
             "section" => "Literature",
             "question" => "In which Shakespeare play does the character Hamlet appear?",
             "answers" => ["Macbeth", "Romeo and Juliet", "Hamlet", "Othello"],
             "correctAnswer" => "Hamlet"
         ],
         [
             "section" => "Literature",
             "question" => "Who wrote 'The Great Gatsby'?",
             "answers" => ["F. Scott Fitzgerald", "John Steinbeck", "Mark Twain", "Ernest Hemingway"],
             "correctAnswer" => "F. Scott Fitzgerald"
         ],
         [
             "section" => "Technology",
             "question" => "Who is the founder of Microsoft?",
             "answers" => ["Steve Jobs", "Bill Gates", "Elon Musk", "Mark Zuckerberg"],
             "correctAnswer" => "Bill Gates"
         ],
         [
             "section" => "Technology",
             "question" => "What does CPU stand for?",
             "answers" => ["Central Process Unit", "Computer Personal Unit", "Central Processing Unit", "Core Processing Unit"],
             "correctAnswer" => "Central Processing Unit"
         ],
         [
             "section" => "Technology",
             "question" => "Which programming language is known for web development?",
             "answers" => ["Python", "Java", "HTML", "C++"],
             "correctAnswer" => "HTML"
         ],
         [
             "section" => "Technology",
             "question" => "Which company developed the iPhone?",
             "answers" => ["Samsung", "Apple", "Google", "Microsoft"],
             "correctAnswer" => "Apple"
         ],
         [
             "section" => "Technology",
             "question" => "What is the primary function of an operating system?",
             "answers" => ["Manage hardware resources", "Run applications", "Provide internet connectivity", "Store files"],
             "correctAnswer" => "Manage hardware resources"
         ],
         [
             "section" => "Sports",
             "question" => "Which sport is known as 'the beautiful game'?",
             "answers" => ["Basketball", "Soccer", "Tennis", "Cricket"],
             "correctAnswer" => "Soccer"
         ],
         [
             "section" => "Sports",
             "question" => "How many players are there in a baseball team?",
             "answers" => ["9", "10", "11", "12"],
             "correctAnswer" => "9"
         ],
         [
             "section" => "Sports",
             "question" => "Which country has won the most FIFA World Cup titles?",
             "answers" => ["Germany", "Argentina", "Brazil", "Italy"],
             "correctAnswer" => "Brazil"
         ],
         [
             "section" => "Sports",
             "question" => "How many rings are there on the Olympic flag?",
             "answers" => ["4", "5", "6", "7"],
             "correctAnswer" => "5"
         ],
         [
             "section" => "Sports",
             "question" => "Which sport is known as 'the sport of kings'?",
             "answers" => ["Polo", "Tennis", "Golf", "Horse Racing"],
             "correctAnswer" => "Horse Racing"
         ],
         [
             "section" => "Entertainment",
             "question" => "Who played the role of Iron Man in the Marvel Cinematic Universe?",
             "answers" => ["Chris Evans", "Robert Downey Jr.", "Chris Hemsworth", "Mark Ruffalo"],
             "correctAnswer" => "Robert Downey Jr."
         ],
         [
             "section" => "Entertainment",
             "question" => "Which movie won the Academy Award for Best Picture in 2020?",
             "answers" => ["Joker", "Parasite", "1917", "Once Upon a Time in Hollywood"],
             "correctAnswer" => "Parasite"
         ],
         [
             "section" => "Entertainment",
             "question" => "Who is the voice of Woody in the 'Toy Story' movies?",
             "answers" => ["Tom Hanks", "Tim Allen", "Robin Williams", "Will Smith"],
             "correctAnswer" => "Tom Hanks"
         ],
         [
             "section" => "Entertainment",
             "question" => "Which famous singer is known as 'The King of Pop'?",
             "answers" => ["Elvis Presley", "Michael Jackson", "Prince", "Freddie Mercury"],
             "correctAnswer" => "Michael Jackson"
         ],
         [
             "section" => "Entertainment",
             "question" => "Which 1997 film features a romance on the ill-fated Titanic?",
             "answers" => ["Romeo + Juliet", "The Notebook", "Titanic", "Moulin Rouge!"],
             "correctAnswer" => "Titanic"
         ],
     ],
 */

    'questions' =>
        $questions = [
            // General Knowledge
            [
                "section" => "General Knowledge",
                "question" => "What is the capital of France?",
                "answers" => ["Berlin", "Madrid", "Paris", "Lisbon"],
                "correctAnswer" => "Paris"
            ],
            [
                "section" => "General Knowledge",
                "question" => "Which planet is known as the Red Planet?",
                "answers" => ["Earth", "Mars", "Jupiter", "Venus"],
                "correctAnswer" => "Mars"
            ],
            [
                "section" => "General Knowledge",
                "question" => "What is the largest continent?",
                "answers" => ["Africa", "Asia", "Europe", "North America"],
                "correctAnswer" => "Asia"
            ],
            [
                "section" => "General Knowledge",
                "question" => "Who wrote 'Hamlet'?",
                "answers" => ["Charles Dickens", "Mark Twain", "William Shakespeare", "J.K. Rowling"],
                "correctAnswer" => "William Shakespeare"
            ],
            [
                "section" => "General Knowledge",
                "question" => "What is the smallest country in the world?",
                "answers" => ["Monaco", "Vatican City", "Nauru", "San Marino"],
                "correctAnswer" => "Vatican City"
            ],

            // Science
            [
                "section" => "Science",
                "question" => "What is the chemical symbol for water?",
                "answers" => ["H2O", "O2", "CO2", "NaCl"],
                "correctAnswer" => "H2O"
            ],
            [
                "section" => "Science",
                "question" => "What planet is known for its rings?",
                "answers" => ["Earth", "Mars", "Jupiter", "Saturn"],
                "correctAnswer" => "Saturn"
            ],
            [
                "section" => "Science",
                "question" => "What is the powerhouse of the cell?",
                "answers" => ["Nucleus", "Mitochondria", "Ribosome", "Endoplasmic Reticulum"],
                "correctAnswer" => "Mitochondria"
            ],
            [
                "section" => "Science",
                "question" => "What is the main gas found in the air we breathe?",
                "answers" => ["Oxygen", "Nitrogen", "Carbon Dioxide", "Hydrogen"],
                "correctAnswer" => "Nitrogen"
            ],
            [
                "section" => "Science",
                "question" => "What is the process by which plants make their food?",
                "answers" => ["Respiration", "Digestion", "Photosynthesis", "Fermentation"],
                "correctAnswer" => "Photosynthesis"
            ],

            // Technology
            [
                "section" => "Technology",
                "question" => "What does Wi-Fi stand for?",
                "answers" => ["Wireless Fidelity", "Wired Fidelity", "Wireless Format", "Wired Format"],
                "correctAnswer" => "Wireless Fidelity"
            ],
            [
                "section" => "Technology",
                "question" => "What is the main function of RAM?",
                "answers" => ["Storage", "Processing", "Temporary storage", "Networking"],
                "correctAnswer" => "Temporary storage"
            ],
            [
                "section" => "Technology",
                "question" => "What does HTML stand for?",
                "answers" => ["Hypertext Markup Language", "Hyperlink and Text Markup Language", "Hypertext Multi-Language", "High-Level Text Markup Language"],
                "correctAnswer" => "Hypertext Markup Language"
            ],
            [
                "section" => "Technology",
                "question" => "Which company is known for its search engine?",
                "answers" => ["Microsoft", "Google", "Apple", "Facebook"],
                "correctAnswer" => "Google"
            ],
            [
                "section" => "Technology",
                "question" => "What is the main function of an operating system?",
                "answers" => ["Run applications", "Manage hardware", "Store data", "Connect to the internet"],
                "correctAnswer" => "Manage hardware"
            ],

            // Sports
            [
                "section" => "Sports",
                "question" => "What sport is known as 'the beautiful game'?",
                "answers" => ["Soccer", "Basketball", "Cricket", "Tennis"],
                "correctAnswer" => "Soccer"
            ],
            [
                "section" => "Sports",
                "question" => "In which sport would you perform a slam dunk?",
                "answers" => ["Football", "Basketball", "Volleyball", "Baseball"],
                "correctAnswer" => "Basketball"
            ],
            [
                "section" => "Sports",
                "question" => "Which country hosted the 2016 Summer Olympics?",
                "answers" => ["USA", "Brazil", "China", "Russia"],
                "correctAnswer" => "Brazil"
            ],
            [
                "section" => "Sports",
                "question" => "Which athlete has won the most Olympic gold medals?",
                "answers" => ["Usain Bolt", "Michael Phelps", "Carl Lewis", "Mark Spitz"],
                "correctAnswer" => "Michael Phelps"
            ],
            [
                "section" => "Sports",
                "question" => "Which sport is known for the Tour de France?",
                "answers" => ["Cycling", "Running", "Swimming", "Rowing"],
                "correctAnswer" => "Cycling"
            ],

            // Entertainment
            [
                "section" => "Entertainment",
                "question" => "Who played Jack in 'Titanic'?",
                "answers" => ["Brad Pitt", "Leonardo DiCaprio", "Johnny Depp", "Matt Damon"],
                "correctAnswer" => "Leonardo DiCaprio"
            ],
            [
                "section" => "Entertainment",
                "question" => "What is the name of the fictional wizarding school in Harry Potter?",
                "answers" => ["Hogwarts", "Durmstrang", "Beauxbatons", "Ilvermorny"],
                "correctAnswer" => "Hogwarts"
            ],
            [
                "section" => "Entertainment",
                "question" => "Which movie features a character named Darth Vader?",
                "answers" => ["Star Trek", "Star Wars", "The Matrix", "Avatar"],
                "correctAnswer" => "Star Wars"
            ],
            [
                "section" => "Entertainment",
                "question" => "What animated movie features a talking snowman named Olaf?",
                "answers" => ["Frozen", "Zootopia", "Tangled", "Moana"],
                "correctAnswer" => "Frozen"
            ],
            [
                "section" => "Entertainment",
                "question" => "Which singer is known as the 'Queen of Pop'?",
                "answers" => ["Madonna", "Beyoncé", "Lady Gaga", "Rihanna"],
                "correctAnswer" => "Madonna"
            ],

            // History
            [
                "section" => "History",
                "question" => "Who was the first female Prime Minister of the UK?",
                "answers" => ["Margaret Thatcher", "Angela Merkel", "Indira Gandhi", "Golda Meir"],
                "correctAnswer" => "Margaret Thatcher"
            ],
            [
                "section" => "History",
                "question" => "What year did the Berlin Wall fall?",
                "answers" => ["1987", "1989", "1990", "1991"],
                "correctAnswer" => "1989"
            ],
            [
                "section" => "History",
                "question" => "Which war was fought between the North and South regions in the United States?",
                "answers" => ["World War I", "World War II", "Civil War", "Vietnam War"],
                "correctAnswer" => "Civil War"
            ],
            [
                "section" => "History",
                "question" => "Who was known as the 'Maid of Orléans'?",
                "answers" => ["Catherine de' Medici", "Marie Antoinette", "Joan of Arc", "Cleopatra"],
                "correctAnswer" => "Joan of Arc"
            ],
            [
                "section" => "History",
                "question" => "What was the name of the ship that sank in 1912?",
                "answers" => ["The Queen Mary", "The Titanic", "The Britannic", "The Lusitania"],
                "correctAnswer" => "The Titanic"
            ],

            // Geography
            [
                "section" => "Geography",
                "question" => "What is the capital city of Canada?",
                "answers" => ["Toronto", "Ottawa", "Vancouver", "Montreal"],
                "correctAnswer" => "Ottawa"
            ],
            [
                "section" => "Geography",
                "question" => "Which country is known as the Land of the Rising Sun?",
                "answers" => ["China", "Japan", "Thailand", "South Korea"],
                "correctAnswer" => "Japan"
            ],
            [
                "section" => "Geography",
                "question" => "What is the largest country in the world by land area?",
                "answers" => ["Canada", "USA", "Russia", "China"],
                "correctAnswer" => "Russia"
            ],
            [
                "section" => "Geography",
                "question" => "Which desert is the largest in the world?",
                "answers" => ["Sahara", "Arabian", "Gobi", "Kalahari"],
                "correctAnswer" => "Sahara"
            ],
            [
                "section" => "Geography",
                "question" => "What river is the longest in the world?",
                "answers" => ["Amazon", "Nile", "Yangtze", "Mississippi"],
                "correctAnswer" => "Nile"
            ],

            // Mathematics
            [
                "section" => "Mathematics",
                "question" => "What is the value of π (pi) to two decimal places?",
                "answers" => ["3.12", "3.14", "3.16", "3.17"],
                "correctAnswer" => "3.14"
            ],
            [
                "section" => "Mathematics",
                "question" => "What is 7 squared?",
                "answers" => ["49", "56", "42", "36"],
                "correctAnswer" => "49"
            ],
            [
                "section" => "Mathematics",
                "question" => "What is the sum of angles in a triangle?",
                "answers" => ["180°", "360°", "90°", "270°"],
                "correctAnswer" => "180°"
            ],
            [
                "section" => "Mathematics",
                "question" => "What is the next prime number after 7?",
                "answers" => ["9", "10", "11", "12"],
                "correctAnswer" => "11"
            ],
            [
                "section" => "Mathematics",
                "question" => "If a triangle has sides of length 3, 4, and 5, what type of triangle is it?",
                "answers" => ["Scalene", "Isosceles", "Equilateral", "Right"],
                "correctAnswer" => "Right"
            ],

            // Literature
            [
                "section" => "Literature",
                "question" => "Who is the author of '1984'?",
                "answers" => ["George Orwell", "Aldous Huxley", "Ray Bradbury", "F. Scott Fitzgerald"],
                "correctAnswer" => "George Orwell"
            ],
            [
                "section" => "Literature",
                "question" => "What is the main theme of 'The Catcher in the Rye'?",
                "answers" => ["Alienation", "Friendship", "War", "Love"],
                "correctAnswer" => "Alienation"
            ],
            [
                "section" => "Literature",
                "question" => "In which book does the character 'Atticus Finch' appear?",
                "answers" => ["The Great Gatsby", "To Kill a Mockingbird", "Pride and Prejudice", "1984"],
                "correctAnswer" => "To Kill a Mockingbird"
            ],
            [
                "section" => "Literature",
                "question" => "What is the main setting of 'The Lord of the Rings'?",
                "answers" => ["Narnia", "Middle-earth", "Hogwarts", "Westeros"],
                "correctAnswer" => "Middle-earth"
            ],
            [
                "section" => "Literature",
                "question" => "Which author is known for the series 'A Song of Ice and Fire'?",
                "answers" => ["J.K. Rowling", "George R.R. Martin", "J.R.R. Tolkien", "C.S. Lewis"],
                "correctAnswer" => "George R.R. Martin"
            ],

            // More Science
            [
                "section" => "Science",
                "question" => "What is the main organ in the human body?",
                "answers" => ["Heart", "Brain", "Lungs", "Liver"],
                "correctAnswer" => "Brain"
            ],
            [
                "section" => "Science",
                "question" => "What is the speed of light?",
                "answers" => ["300,000 km/s", "150,000 km/s", "450,000 km/s", "600,000 km/s"],
                "correctAnswer" => "300,000 km/s"
            ],
            [
                "section" => "Science",
                "question" => "What is the chemical symbol for gold?",
                "answers" => ["Ag", "Au", "Pb", "Fe"],
                "correctAnswer" => "Au"
            ],
            [
                "section" => "Science",
                "question" => "How many bones are in the adult human body?",
                "answers" => ["206", "205", "201", "208"],
                "correctAnswer" => "206"
            ],
            [
                "section" => "Science",
                "question" => "What part of the plant conducts photosynthesis?",
                "answers" => ["Roots", "Stem", "Leaves", "Flowers"],
                "correctAnswer" => "Leaves"
            ],

            // More Technology
            [
                "section" => "Technology",
                "question" => "What is the main purpose of a firewall?",
                "answers" => ["To protect data", "To manage network traffic", "To speed up the internet", "To back up files"],
                "correctAnswer" => "To protect data"
            ],
            [
                "section" => "Technology",
                "question" => "Which of the following is a web browser?",
                "answers" => ["Google", "Facebook", "Chrome", "Twitter"],
                "correctAnswer" => "Chrome"
            ],
            [
                "section" => "Technology",
                "question" => "What does CPU stand for?",
                "answers" => ["Central Processing Unit", "Computer Personal Unit", "Centralized Processing Unit", "Computer Power Unit"],
                "correctAnswer" => "Central Processing Unit"
            ],
            [
                "section" => "Technology",
                "question" => "What is the primary function of a database?",
                "answers" => ["Store data", "Process data", "Transmit data", "Encrypt data"],
                "correctAnswer" => "Store data"
            ],
            [
                "section" => "Technology",
                "question" => "What is the most widely used operating system?",
                "answers" => ["Windows", "Linux", "macOS", "Unix"],
                "correctAnswer" => "Windows"
            ],

            // More Sports
            [
                "section" => "Sports",
                "question" => "Which country won the FIFA World Cup in 2018?",
                "answers" => ["Germany", "Brazil", "France", "Argentina"],
                "correctAnswer" => "France"
            ],
            [
                "section" => "Sports",
                "question" => "What is the national sport of Japan?",
                "answers" => ["Baseball", "Sumo Wrestling", "Soccer", "Martial Arts"],
                "correctAnswer" => "Sumo Wrestling"
            ],
            [
                "section" => "Sports",
                "question" => "What sport is played at Wimbledon?",
                "answers" => ["Golf", "Soccer", "Tennis", "Cricket"],
                "correctAnswer" => "Tennis"
            ],
            [
                "section" => "Sports",
                "question" => "In which sport would you find a hoop?",
                "answers" => ["Soccer", "Basketball", "Baseball", "Golf"],
                "correctAnswer" => "Basketball"
            ],
            [
                "section" => "Sports",
                "question" => "What is the highest score possible in ten-pin bowling?",
                "answers" => ["200", "300", "400", "100"],
                "correctAnswer" => "300"
            ],

            // More Entertainment
            [
                "section" => "Entertainment",
                "question" => "Who directed 'Inception'?",
                "answers" => ["Christopher Nolan", "Steven Spielberg", "Martin Scorsese", "Quentin Tarantino"],
                "correctAnswer" => "Christopher Nolan"
            ],
            [
                "section" => "Entertainment",
                "question" => "What is the highest-grossing animated film of all time?",
                "answers" => ["Frozen II", "The Lion King", "Toy Story 4", "Frozen"],
                "correctAnswer" => "Frozen II"
            ],
            [
                "section" => "Entertainment",
                "question" => "Which musician is known as 'The Boss'?",
                "answers" => ["Bruce Springsteen", "Elton John", "Bob Dylan", "Paul McCartney"],
                "correctAnswer" => "Bruce Springsteen"
            ],
            [
                "section" => "Entertainment",
                "question" => "What was the first animated film to be nominated for Best Picture at the Oscars?",
                "answers" => ["Toy Story", "Beauty and the Beast", "The Lion King", "Up"],
                "correctAnswer" => "Beauty and the Beast"
            ],
            [
                "section" => "Entertainment",
                "question" => "In which film does the phrase 'I'll be back' originate?",
                "answers" => ["The Terminator", "Predator", "RoboCop", "Die Hard"],
                "correctAnswer" => "The Terminator"
            ],

            // More History
            [
                "section" => "History",
                "question" => "Who was the first President of the United States?",
                "answers" => ["George Washington", "Thomas Jefferson", "Abraham Lincoln", "John Adams"],
                "correctAnswer" => "George Washington"
            ],
            [
                "section" => "History",
                "question" => "Which ancient civilization built the pyramids?",
                "answers" => ["Babylonian", "Egyptian", "Greek", "Roman"],
                "correctAnswer" => "Egyptian"
            ],
            [
                "section" => "History",
                "question" => "In what year did World War II end?",
                "answers" => ["1945", "1939", "1941", "1950"],
                "correctAnswer" => "1945"
            ],
            [
                "section" => "History",
                "question" => "Who was known as the 'Iron Lady'?",
                "answers" => ["Angela Merkel", "Margaret Thatcher", "Indira Gandhi", "Golda Meir"],
                "correctAnswer" => "Margaret Thatcher"
            ],
            [
                "section" => "History",
                "question" => "Which event started the French Revolution?",
                "answers" => ["Storming of the Bastille", "The Declaration of Independence", "The Reign of Terror", "The signing of the Treaty of Versailles"],
                "correctAnswer" => "Storming of the Bastille"
            ],

            // More Geography
            [
                "section" => "Geography",
                "question" => "Which ocean is the largest?",
                "answers" => ["Atlantic Ocean", "Indian Ocean", "Arctic Ocean", "Pacific Ocean"],
                "correctAnswer" => "Pacific Ocean"
            ],
            [
                "section" => "Geography",
                "question" => "Which mountain range is the highest in the world?",
                "answers" => ["Andes", "Rockies", "Himalayas", "Alps"],
                "correctAnswer" => "Himalayas"
            ],
            [
                "section" => "Geography",
                "question" => "What is the capital of Australia?",
                "answers" => ["Sydney", "Canberra", "Melbourne", "Brisbane"],
                "correctAnswer" => "Canberra"
            ],
            [
                "section" => "Geography",
                "question" => "Which country is home to the kangaroo?",
                "answers" => ["USA", "Australia", "Canada", "New Zealand"],
                "correctAnswer" => "Australia"
            ],
            [
                "section" => "Geography",
                "question" => "What is the largest island in the world?",
                "answers" => ["Australia", "Greenland", "New Guinea", "Borneo"],
                "correctAnswer" => "Greenland"
            ],

            // More Mathematics
            [
                "section" => "Mathematics",
                "question" => "What is 12 divided by 4?",
                "answers" => ["2", "3", "4", "6"],
                "correctAnswer" => "3"
            ],
            [
                "section" => "Mathematics",
                "question" => "What is the value of 10% of 200?",
                "answers" => ["10", "20", "30", "40"],
                "correctAnswer" => "20"
            ],
            [
                "section" => "Mathematics",
                "question" => "What is the square root of 64?",
                "answers" => ["6", "7", "8", "9"],
                "correctAnswer" => "8"
            ],
            [
                "section" => "Mathematics",
                "question" => "What is 15% of 300?",
                "answers" => ["45", "60", "75", "90"],
                "correctAnswer" => "45"
            ],
            [
                "section" => "Mathematics",
                "question" => "If a rectangle has a length of 10 and a width of 5, what is its area?",
                "answers" => ["15", "50", "60", "100"],
                "correctAnswer" => "50"
            ],

            // More Literature
            [
                "section" => "Literature",
                "question" => "Who wrote 'Pride and Prejudice'?",
                "answers" => ["Charlotte Brontë", "Jane Austen", "Emily Brontë", "Mary Shelley"],
                "correctAnswer" => "Jane Austen"
            ],
            [
                "section" => "Literature",
                "question" => "What is the title of the first Harry Potter book?",
                "answers" => ["Harry Potter and the Chamber of Secrets", "Harry Potter and the Philosopher's Stone", "Harry Potter and the Goblet of Fire", "Harry Potter and the Order of the Phoenix"],
                "correctAnswer" => "Harry Potter and the Philosopher's Stone"
            ],
            [
                "section" => "Literature",
                "question" => "In which book do the characters Frodo and Sam appear?",
                "answers" => ["The Hobbit", "The Chronicles of Narnia", "The Lord of the Rings", "Harry Potter"],
                "correctAnswer" => "The Lord of the Rings"
            ],
            [
                "section" => "Literature",
                "question" => "Which novel begins with the line 'It was the best of times, it was the worst of times'?",
                "answers" => ["A Tale of Two Cities", "Great Expectations", "Oliver Twist", "David Copperfield"],
                "correctAnswer" => "A Tale of Two Cities"
            ],
            [
                "section" => "Literature",
                "question" => "Who is the main character in 'Moby-Dick'?",
                "answers" => ["Ishmael", "Captain Ahab", "Queequeg", "Starbuck"],
                "correctAnswer" => "Ishmael"
            ],
        ]

];
