<?php
    include "db_connect.php";
?>



<form method="POST" action="gantt_add_database.php":

<div id="controls-container">
    <form method="POST" action="gantt_add_database.php">
          <h2>Add task</h2>
          <label for="task-name">Task name</label>
          <input id="task-name" name="task-name" required />
            <label for="id-number">ID Number</label>
          <input id="id-number" name="id-number" required />

          <label for="start-date">Start date</label>
          <input
            type="date"
            id="start-date"
            name="start-date"
            value="2022-11-08"
            min="2022-01-01"
            max="2050-12-31"
          />
          <label for="end-date">End date</label>
          <input
            type="date"
            id="end-date"
            name="end-date"
            value="2022-11-10"
            min="2022-01-01"
            max="2050-12-31"
          />

          <label for="progress">Progress (%)</label>
          <input
            type="number"
            id="progress"
            name="progress"
            value="0"
            min="0"
            max="100"
          />
          <div class="important-checkbox-container">
            <label for="is-important">Is it an important task?</label>
            <input type="checkbox" id="is-important" name="is-important" />
          </div>
          <button>Add</button>
        </form>
      </div>