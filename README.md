# 🎟️ Smart Seat Reservation & Allocation System

<p align="center">
  <img src="images/cinema.png" alt="Smart Seat Reservation & Allocation System" width="700">
</p>

<p align="center">
  A smart web-based seat reservation and allocation system designed to organize participants and automatically assign seats according to category priority, payment timing, and center-outward seating preferences.
</p>

<p align="center">

![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge\&logo=html5\&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge\&logo=css3\&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge\&logo=php\&logoColor=white)
![JSON](https://img.shields.io/badge/JSON-000000?style=for-the-badge\&logo=json\&logoColor=white)
![XAMPP](https://img.shields.io/badge/XAMPP-FB7A24?style=for-the-badge\&logo=xampp\&logoColor=white)

</p>

<p align="center">

![GitHub Repo Size](https://img.shields.io/github/repo-size/the-umair-arsh/SMART_SEAT_RESERVATION_-_ALLOCATION_SYSTEM?style=flat-square)
![GitHub Last Commit](https://img.shields.io/github/last-commit/the-umair-arsh/SMART_SEAT_RESERVATION_-_ALLOCATION_SYSTEM?style=flat-square)
![GitHub Language Count](https://img.shields.io/github/languages/count/the-umair-arsh/SMART_SEAT_RESERVATION_-_ALLOCATION_SYSTEM?style=flat-square)
![GitHub Stars](https://img.shields.io/github/stars/the-umair-arsh/SMART_SEAT_RESERVATION_-_ALLOCATION_SYSTEM?style=flat-square)

</p>

---

## 📌 About the Project

**Smart Seat Reservation & Allocation System** is a web-based application developed to simplify the process of registering participants and automatically assigning them seats in an organized seating layout.

Instead of manually deciding where each participant should sit, the system processes the participant information and applies a predefined **priority-based seat allocation algorithm**.

The system considers:

* Participant category
* Payment time
* Seat availability
* Category-specific row allocation
* Center-priority seating

The result is a structured seating arrangement that can be generated automatically and displayed through a dedicated seating view.

---

## ✨ Key Features

* 👤 **Participant Management**

  * Add participant information
  * Store participant records
  * Delete participant records

* 🎟️ **Category-Based Priority**

  * VIP participants receive the highest allocation priority
  * Semi-Inclusive participants are processed next
  * Inclusive participants are processed after them

* ⏱️ **Payment-Time Priority**

  * Participants belonging to the same category are ordered according to their payment time
  * Earlier payment receives allocation priority

* 🎯 **Center-Outward Seat Allocation**

  * Seats are assigned starting from the center
  * Allocation then moves alternately toward the left and right
  * This provides a center-priority seating arrangement

* 🪑 **Category-Based Rows**

  * VIP participants are allocated within the VIP row range
  * Semi-Inclusive participants are allocated within their designated row range
  * Inclusive participants are allocated within their designated row range

* 📊 **Visual Seating Layout**

  * Generated seating arrangement can be viewed in an organized layout
  * Assigned seat information includes participant name, category, and seat number

* 💾 **JSON Data Storage**

  * Participant and seating information is stored using JSON files
  * No database server is required for the current implementation

* ⚡ **Automatic Allocation**

  * A single allocation process automatically generates the seating arrangement

---

## 🧠 Seat Allocation Algorithm

The core functionality of this project is its **category-based priority and center-outward allocation algorithm**.

### 1. Participant Priority

Participants are first sorted according to their category:

| Priority | Category       |
| -------- | -------------- |
| 🥇 1     | VIP            |
| 🥈 2     | Semi-Inclusive |
| 🥉 3     | Inclusive      |

This ensures that higher-priority categories are processed before lower-priority categories.

### 2. Payment-Time Priority

If two or more participants belong to the same category, their **payment time** determines their order.

The participant who paid earlier is processed first.

Therefore, the overall ordering works as:

**Category Priority → Payment Time → Seat Allocation**

### 3. Center-Outward Seating

Once participants are sorted, available seats are checked using the following column order:

```text
3 → 2 → 4 → 1 → 5 → 0 → 6
```

For a 7-seat row, this corresponds conceptually to:

```text
        CENTER
          ↓
Seat 4 → Seat 3 → Seat 5 → Seat 2 → Seat 6 → Seat 1 → Seat 7
```

So the algorithm prioritizes:

**Center → Center-Left → Center-Right → Further-Left → Further-Right → Edge Seats**

This creates a **center-priority seating pattern** rather than simply filling seats from left to right.

### 4. Category Row Allocation

Participants are also restricted to specific row ranges:

| Category       | Allocated Rows |
| -------------- | -------------- |
| VIP            | Rows 1–2       |
| Semi-Inclusive | Rows 2–3       |
| Inclusive      | Rows 5–6       |

Within the permitted rows, the system searches for the first available seat according to the center-outward column order.

---

## 🔄 System Workflow

```text
          ┌──────────────────────┐
          │  Add Participant     │
          └──────────┬───────────┘
                     ↓
          ┌──────────────────────┐
          │ Store Participant    │
          │      Data            │
          └──────────┬───────────┘
                     ↓
          ┌──────────────────────┐
          │ Sort Participants    │
          │ by Category Priority │
          └──────────┬───────────┘
                     ↓
          ┌──────────────────────┐
          │ Sort Same Category   │
          │ by Payment Time      │
          └──────────┬───────────┘
                     ↓
          ┌──────────────────────┐
          │ Select Category      │
          │ Specific Rows        │
          └──────────┬───────────┘
                     ↓
          ┌──────────────────────┐
          │ Search Seats         │
          │ Center → Outward     │
          └──────────┬───────────┘
                     ↓
          ┌──────────────────────┐
          │ Save Seating         │
          │ Arrangement          │
          └──────────┬───────────┘
                     ↓
          ┌──────────────────────┐
          │ Display Seating      │
          │ Arrangement          │
          └──────────────────────┘
```

---

## 🛠️ Technologies Used

| Technology         | Purpose                               |
| ------------------ | ------------------------------------- |
| **HTML5**          | Structure and user interface          |
| **CSS3**           | Styling and visual presentation       |
| **PHP**            | Application logic and seat allocation |
| **JSON**           | Participant and seating data storage  |
| **XAMPP / Apache** | Local PHP development environment     |

---

## 📁 Project Structure

```text
SMART_SEAT_RESERVATION_-_ALLOCATION_SYSTEM/
│
├── data/
│   ├── participants.json
│   └── seating.json
│
├── images/
│   └── cinema.png
│
├── add_participant.php
├── allocate.php
├── delete_participant.php
├── index.php
├── save_participant.php
├── show_seating.php
├── style.css
├── .gitignore
└── README.md
```

### Important Files

**`index.php`**
Main interface of the application.

**`add_participant.php`**
Handles the participant addition interface/process.

**`save_participant.php`**
Stores participant information in the JSON data file.

**`delete_participant.php`**
Handles removal of participant records.

**`allocate.php`**
Contains the core seat allocation algorithm, including category priority, payment-time ordering, row restrictions, and center-outward seat selection.

**`show_seating.php`**
Displays the generated seating arrangement.

**`data/participants.json`**
Stores participant information.

**`data/seating.json`**
Stores the generated seating arrangement.

**`style.css`**
Contains the application's visual styling.

---

## 🚀 How to Run Locally

### Prerequisites

Before running the project, install:

* [XAMPP](https://www.apachefriends.org/)
* A modern web browser
* Git (optional, if cloning the repository)

### Method 1 — Clone from GitHub

Open Command Prompt or PowerShell and navigate to the XAMPP `htdocs` directory:

```powershell
cd C:\xampp\htdocs
```

Clone the repository:

```powershell
git clone https://github.com/the-umair-arsh/SMART_SEAT_RESERVATION_-_ALLOCATION_SYSTEM.git
```

The project will be downloaded into:

```text
C:\xampp\htdocs\SMART_SEAT_RESERVATION_-_ALLOCATION_SYSTEM
```

### Method 2 — Download ZIP

Download the repository as a ZIP file from GitHub and extract the project inside:

```text
C:\xampp\htdocs\
```

Make sure the project folder is directly inside `htdocs`.

---

### ▶️ Start the Application

1. Open **XAMPP Control Panel**.
2. Start **Apache**.
3. MySQL is **not required** for the current version because the application uses JSON files for data storage.
4. Open your browser.
5. Visit:

```text
http://localhost/SMART_SEAT_RESERVATION_-_ALLOCATION_SYSTEM/
```

The application should now be running locally.

---

## 🧪 Example Allocation Logic

Suppose the system receives participants from three categories:

```text
VIP
VIP
Semi-Inclusive
Inclusive
Inclusive
```

The system first processes:

```text
VIP → VIP → Semi-Inclusive → Inclusive → Inclusive
```

For each participant, the system checks their permitted rows and searches for an available seat using:

```text
Center
  ↓
Left of Center
  ↓
Right of Center
  ↓
Further Left
  ↓
Further Right
  ↓
Edges
```

This ensures that the seating arrangement follows the predefined priority rules automatically.

---

## 💾 Data Storage

The current system uses **JSON-based file storage** rather than a relational database.

### Participant Data

Participant information is maintained in:

```text
data/participants.json
```

### Seating Data

The generated seating arrangement is stored in:

```text
data/seating.json
```

This makes the project lightweight and easy to run locally without requiring database configuration.

---

## 🎯 Project Objectives

The main objectives of this project are to:

* Automate seat reservation and allocation
* Reduce manual seating management
* Prioritize participants according to defined categories
* Consider payment timing when participants have the same priority
* Provide center-priority seating
* Maintain an organized seating arrangement
* Provide a simple and user-friendly interface
* Demonstrate practical implementation of PHP-based application logic and file-based data management

---

## 🔮 Future Improvements

Potential improvements for future versions include:

* 🔐 User authentication and admin login
* 🗄️ MySQL database integration
* 📱 Fully responsive mobile interface
* 🔍 Search and filter participants
* ✏️ Participant editing functionality
* 📥 Export seating arrangements to PDF/Excel
* 📊 Admin dashboard with statistics
* 🪑 Interactive visual seat selection
* 🔄 Real-time seat availability
* 📝 Reservation history and audit logs

---

## 📌 Current Project Status

**Status:** ✅ Functional

The current version provides participant management, automated category-based seat allocation, payment-time prioritization, JSON data storage, and visual seating arrangement.

---

## 👨‍💻 Author

### Muhammad Umair

Software Engineering Student & Developer

<p>
  <a href="https://github.com/the-umair-arsh">
    <img src="https://img.shields.io/badge/GitHub-the--umair--arsh-181717?style=for-the-badge&logo=github&logoColor=white">
  </a>
  <a href="https://www.linkedin.com/in/muhammad-umair-se">
    <img src="https://img.shields.io/badge/LinkedIn-Muhammad%20Umair-0A66C2?style=for-the-badge&logo=linkedin&logoColor=white">
  </a>
</p>

---

## ⭐ Acknowledgement

This project was developed as a practical software engineering project to demonstrate web development, file-based data management, sorting algorithms, priority handling, and automated seat allocation.

---

<p align="center">
  <b>Smart Seat Reservation & Allocation System</b>
  <br>
  Built with HTML, CSS, PHP & JSON
</p>
