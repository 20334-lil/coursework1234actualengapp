<?php
    include "gantt_variables.php";
 include  "navbar.php";
include "g_add.php";
include "g_del.php";

?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>Gantt Application</title>
   
        <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/frappe-gantt/dist/frappe-gantt.css"
/>
    <script src="https://cdn.jsdelivr.net/npm/frappe-gantt/dist/frappe-gantt.umd.js"></script>

        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        <style>
            .container {
                width: 90%;
                margin: 0 auto;
            }

            .chart {
                border: 1px dotted black;
                border-radius: 4px;
                height: fit-content;
            }

            .chart.active {
                filter: drop-shadow(1px 1px 4px rgba(0, 0, 0, 0.6));
                border: unset;
            }

            small {
                font-size: 0.775em;
            }
        </style>
        
    </head>
    <body>
        <div class="container">
            <h1 class="text-center pt-3 pb-2 font-serif">The Project Management Gantt</h1>
            <hr />
            <div class="row my-5">
                <div class="col-md-3 px-5 py-1">
                    <h3 class="text-center">Set edit access</h3>
                    
                    <div class="form-check form-switch">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            role="switch"
                            id="mutable-general"
                            checked
                        />
                        <label class="form-check-label" for="mutable-general"
                            >Editable</label
                        >
                    </div>
                    <div class="form-check form-switch">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            role="switch"
                            id="mutable-progress"
                            checked
                        />
                        <label class="form-check-label" for="mutable-general"
                            >Progress editable</label
                        >
                    </div>
                    <div class="form-check form-switch">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            role="switch"
                            id="mutable-dates"
                            checked
                        />
                        <label class="form-check-label" for="mutable-general"
                            >Dates editable</label
                        >
                    </div>
                </div>

                <div class="chart col-md-9" id="mutability"></div>
            </div>
                <div class="col-md-3 px-5 py-1">
                    <div class="row my-5">
               
                    
                </div>
            </div>

         
                
        <script type="module">
            const rawToday = new Date();
            const today =
                Date.UTC(
                    rawToday.getFullYear(),
                    rawToday.getMonth(),
                    rawToday.getDate(),
                ) +
                new Date().getTimezoneOffset() * 60000;

            function random(begin = 10, end = 90, multiple = 10) {
                let k;
                do {
                    k = Math.floor(Math.random() * 100);
                } while (k < begin || k > end || k % multiple !== 0);
                return k;
            }

            const daysSince = (dx) => new Date(today + dx * 86400000);
           
let tasks = [];
console.log(tasks);


           
            const mutability = new Gantt('#mutability', tasks);
           
            const UPDATES = [
                [
                    mutability,
                    {
                        'mutable-general': 'opp__readonly',
                        'mutable-dates': 'opp__readonly_dates',
                        'mutable-progress': 'opp__readonly_progress',
                    },
                    (id, val) => {
                        if (id === 'mutable-general') {
                            document.getElementById('mutable-dates').checked =
                                !val;
                            document.getElementById(
                                'mutable-progress',
                            ).checked = !val;
                        }
                    },
                ],
        
   
            ];

            for (let [chart, details, after] of UPDATES) {
                for (let id in details) {
                    let el = document.getElementById(id);
                    el.onchange = (e) => {
                        let label = details[id];
                        let val;

                        if (e.currentTarget.type === 'checkbox') {
                            if (typeof label === 'string') {
                                let opposite = label.slice(0, 5) === 'opp__';
                                if (opposite) label = label.slice(5);
                                val = opposite
                                    ? !e.currentTarget.checked
                                    : e.currentTarget.checked;
                            } else {
                                val = label[e.currentTarget.checked ? 1 : 2];
                                label = label[0];
                            }
                        } else {
                            val = +e.currentTarget.value;
                        }

                        let store = chart.options.scroll_to;
                        let scroll = chart.$container.scrollLeft;
                        if (typeof label === 'function') {
                            chart.update_options({
                                ...label(val),
                                scroll_to: null,
                            });
                        } else {
                            chart.update_options({
                                [label]: val,
                                scroll_to: null,
                            });
                        }

                        chart.options.scroll_to = store;
                        chart.$container.scrollLeft = scroll;
                        after && after(id, val, chart);
                    };
                }
            }
       
        </script>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"
        ></script>
      
    </body>
</html>