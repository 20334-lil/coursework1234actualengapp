 <script>
        let score = 0;

        // Increment score on circle click
        const circle = document.getElementById('circle');
        const scoreDisplay = document.getElementById('score');
        const resetButton = document.getElementById('reset-button');

        circle.addEventListener('click', () => {
            score++;
            scoreDisplay.textContent = score;
        });

        // Reset the score
        resetButton.addEventListener('click', () => {
            score = 0;
            scoreDisplay.textContent = score;
        });
    </script>

(styling)

#circle {
            width: 200px;
            height: 200px;
            background-color: #a47dab;
            border-radius: 50%;
            display: inline-block;
            cursor: pointer;
            transition: transform 0.1s, box-shadow 0.1s;
            position: relative;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }

        #circle:active {
            transform: scale(0.9);
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
        }

       
        #score {
            font-size: 28px;
            font-weight: bold;
            margin: 20px 0;
            color: #000000;
        }

        button {
            padding: 12px 24px;
            font-size: 18px;
            cursor: pointer;
            background-color: #89cff0;
            color: white;
            border: none;
            border-radius: 8px;
            margin-top: 20px;
            transition: background-color 0.3s;
        }

