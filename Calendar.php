<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar</title>
    <link rel="stylesheet" href="Calendar.css">
    <meta name="viewport"  content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <script src="Calendar.js" defer></script>
    <script src="https://kit.fontawesome.com/c08e2b6902.js" crossorigin="anonymous"></script>

</head>
<body>

    <input type="checkbox" id="check">
    <label for="check">
      <i class="fas fa-bars" id="btn"></i>
      <i class="fas fa-times" id="cancel"></i>
    </label>
    <div class="sidebar">
      <header>Menu</header>
      <ul>
        <li><a href="#"><i class="fas fa-home"></i>Home</a></li>
        <li><a href="entry.php"><i class="fas fa-edit"></i>Write Entry</a></li>
        <li id="entries"><a href="entries.php"><i class="fas fa-archive"></i>Entries</a></li>
        <li><a href="Calendar.php"><i class="fas fa-calendar-week">Calendar</i></a></li>
        
      </ul>
  
    </div>
    
<div class="wrapper">
    
    <header>
    
        <p class="current-date"></p>
        <div class="icons">
            <span id = "prev" class = "material-symbols-rounded">chevron_left</span>
            <span id ="next"  class = "material-symbols-rounded">chevron_right</span>
        
        </div>
    </header>
    <div class="calendar">
        <ul class="weeks">
            <li>Sun</li>
            <li>Mon</li>
            <li>Tues</li>
            <li>Wed</li>
            <li>Thurs</li>
            <li>Fri</li>
            <li>Sat</li>
        </ul>

        <ul class="days">
        <li class="inactive">25</li>
        <li class="inactive">26</li>
        <li class="inactive">27</li>
        <li class="inactive">28</li>
        <li class="inactive">29</li>
        <li>1</li>
        <li>2</li>
        <li>3</li>
        <li>4</li>
        <li>5</li>
        <li>6</li>
        <li>7</li>
        <li>8</li>
        <li>9</li>
        <li>10</li>
        <li>11</li>
        <li>12</li>
        <li>13</li>
        <li>14</li>
        <li>15</li>
        <li>16</li>
        <li>17</li>
        <li>18</li>
        <li>19</li>
        <li>20</li>
        <li>21</li>
        <li>22</li>
        <li>23</li>
        <li class="active">24</li>
        <li>26</li>
        <li>27</li>
        <li>28</li>
        <li>29</li>
        <li>30</li>
        <li>31</li>
        <li class="inactive">1</li>
        <li class="inactive">2</li>  
        <li class="inactive">3</li> 
        <li class="inactive">4</li> 
        <li class="inactive">5</li> 
        <li class="inactive">6</li> 
    </ul>
    </div>
</div>

</body>
</html>