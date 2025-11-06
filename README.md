# MasterMind (PHP MVC)

This project is an implementation of the classic **MasterMind** game using the **Model–View–Controller (MVC)** architecture in PHP.  

---

## Overview

The game randomly generates a secret combination of digits.  
The player must guess this code by submitting successive attempts.  
After each attempt, the program provides feedback on:
- The number of **well-placed digits** (correct digit in the correct position)
- The number of **misplaced digits** (correct digit in the wrong position)

The game continues until the player successfully finds the combination.

---

## Project Structure
MasterMindGame/
├── MasterMindClass.php # Model: defines the MasterMind class and game logic
├── MasterMindModel.php # Model helper: validation and comparison functions
├── MasterMindController.php # Controller: handles user input, session, and game flow
├── MasterMindView.php # View: renders the HTML interface
├── MasterMindStyle.css # CSS styling for the interface




---

## Features

- Object-oriented PHP design
- Session-based state management
- Clean MVC separation (Model, View, Controller)
- Dynamic user interface with form input and results display
- Option to restart or change the code length

---

## How to Run

1. Make sure you have **PHP ≥ 8.0** installed.
2. Start a local PHP server in the project directory:
   ```bash
   php -S localhost:8000

3.Open your browser and visit:

http://localhost:8000/MasterMindController.php
