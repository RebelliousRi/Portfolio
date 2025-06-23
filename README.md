# Portfolio
This is a coding portfolio containing every program I have created, showcasing my skillset journey.

# Project Name

## Overview
A short description of the project. What does it do? What problem does it solve?

## Technologies Used
- Python 3.11
- Flask
- SQLite
(or whatever applies)

## Features
- User login system
- CRUD operations for tasks
- Responsive design using Tailwind

## Setup Instructions
1. Clone the repo
2. Run `pip install -r requirements.txt`
3. Start the server with `python app.py`

## Status
Still in progress / Complete / Looking for feedback

## License
MIT License  
(Or link to your license / reuse policy)




## Binary Search Algorithm
This algorithm efficiently finds a target number in a sorted array using divide-and-conquer.

### Pseudocode
1. Set `low` to 0 and `high` to length of array - 1.
2. While `low <= high`:
   - Calculate `mid = (low + high) // 2`
   - If `array[mid] == target`: return index
   - If `array[mid] < target`: search right half
   - Else: search left half

### Pascal Implementation
```pascal
function BinarySearch(arr: array of Integer; target: Integer): Integer;
...






---

### ✅ If You're Targeting Developers or Employers

Then you might want to:
- Include **just the Pascal implementation**
- Add **brief algorithm summaries** in the README or as comments

This keeps the repo clean and code-focused.

---

### ❌ Avoid including both **separately** with no explanation

That feels repetitive and clutters your repo. Instead, **combine them**, and provide a rationale:  
"This Pascal implementation demonstrates how I applied the X algorithm to solve Y problem."

---

### 🧠 Pro Tips

- If you’re transitioning to a more modern language (e.g., Python, JavaScript), consider **rewriting 1–2 of your favorite Pascal algorithms**. Show your growth.
- Pascal is niche — keeping it in your portfolio is fine (especially for academic history), but it helps to highlight **language versatility** too.

---

Would you like help organizing your early algorithm projects into a structured archive with good README formatting? That could make it much easier for others to navigate.
