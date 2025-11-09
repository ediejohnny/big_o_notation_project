# Big O Notation Learning Platform

An interactive educational web application built with Laravel 12.x to teach Big O Notation concepts through practical, hands-on examples.

## 🎯 Project Overview

This platform is designed to help young programmers (ages 16+) understand algorithm complexity through:

- **Interactive Examples**: Real-time algorithm execution with editable inputs
- **Visual Learning**: Step-by-step visualization of how algorithms work
- **Multiple Complexities**: Coverage of O(1), O(log n), O(n), O(n log n), O(n²), O(n³), O(2ⁿ), and O(n!)
- **Comparative Analysis**: Side-by-side comparison of brute force vs. optimized approaches
- **Performance Metrics**: Live tracking of operations, execution time, and complexity analysis

## 🚀 Features

### Algorithm Complexities Covered

- **O(1) - Constant**: Array access by index, HashMap insertion, even/odd verification
- **O(log n) - Logarithmic**: Binary search, balanced binary tree operations
- **O(n) - Linear**: Linear search, finding max/min, array sum, optimized Two Sum
- **O(n log n) - Linearithmic**: Merge Sort, Quick Sort, Heap Sort
- **O(n²) - Quadratic**: Bubble Sort, Selection Sort, brute force Two Sum
- **O(2ⁿ) - Exponential**: Recursive Fibonacci, power set generation, Tower of Hanoi
- **O(n!) - Factorial**: Permutation generation, Traveling Salesman Problem

### Interactive Components

Built with **Laravel Livewire** for real-time interactivity:
- Edit arrays and input values directly in the browser
- Execute algorithms and see instant results
- Visualize algorithm execution step-by-step
- Compare different approaches (brute force vs. optimized)
- View performance metrics in real-time

### Design Features

- **Responsive Design**: Desktop sidebar navigation, mobile hamburger menu
- **Dark/Light Theme**: User-controlled theme toggle with localStorage persistence
- **Clean UI**: Minimalist design focused on learning, built with Tailwind CSS v4
- **No Authentication**: Public access to all educational content

## 🛠️ Tech Stack

- **Framework**: Laravel 12.x (PHP)
- **Frontend**: Livewire 3.6.4, Alpine.js 3.x
- **Styling**: Tailwind CSS v4
- **Build Tool**: Vite 7.2.2
- **Database**: SQLite

## 📋 Prerequisites

- PHP 8.2 or higher
- Composer
- Node.js & npm
- SQLite

## 🔧 Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/YOUR_USERNAME/big_o_notation_project.git
   cd big_o_notation_project
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install JavaScript dependencies**
   ```bash
   npm install
   ```

4. **Set up environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Create database**
   ```bash
   touch database/database.sqlite
   php artisan migrate
   ```

6. **Build assets**
   ```bash
   npm run build
   # or for development with hot reload
   npm run dev
   ```

7. **Start development server**
   ```bash
   php artisan serve
   ```

8. **Access the application**
   
   Open your browser and navigate to `http://localhost:8000`

## 🎨 Code Conventions

This project follows strict coding standards:

### No Else Rule

**We NEVER use `else` or `elseif`** - Instead, we use:
- Early return pattern
- Guard clauses
- Independent if statements
- Pattern matching (match/switch when appropriate)

```php
// ❌ WRONG - Don't use else
public function process($data) {
    if ($data === null) {
        return 'null';
    } else {
        return 'valid';
    }
}

// ✅ CORRECT - Early return
public function process($data) {
    if ($data === null) {
        return 'null';
    }
    
    return 'valid';
}
```

### Naming Conventions

- **Variables & Methods**: English (e.g., `binarySearch()`, `bubbleSort()`, `$numbers`)
- **Code Comments**: English
- **UI Content**: Portuguese (BR) - will be internationalized later
- **Example Classes**: Use `Example` suffix (e.g., `TwoSumExample`, `BinarySearchExample`)

## 🗂️ Project Structure

```
app/
├── Http/Controllers/    # Route controllers for each complexity
├── Livewire/           # Interactive algorithm components
│   └── Examples/       # Algorithm examples (TwoSum, BinarySearch, etc.)
└── Models/             # Database models (if needed)

resources/
├── css/
│   └── app.css        # Tailwind CSS v4 with dark mode variant
├── js/
│   └── app.js         # Theme toggle and utilities
└── views/
    ├── layouts/
    │   └── app.blade.php    # Main layout with sidebar
    └── home.blade.php       # Landing page

routes/
└── web.php            # Application routes
```

## 🎓 Educational Approach

Each algorithm complexity page includes:

1. **Clear Explanation**: Complexity concept explained for 16-year-old learners
2. **Multiple Challenges**: Practical problems demonstrating the complexity
3. **Interactive Playground**: Livewire component to test with custom inputs
4. **Dropdown Solutions**: Expandable sections with:
   - Complete commented code
   - Step-by-step reasoning
   - Complexity analysis
   - Comparison with alternative approaches
5. **Visual Feedback**: Real-time algorithm execution visualization
6. **Performance Metrics**: Operation count, execution time, complexity validation

## 🤝 Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 🙏 Acknowledgments

- Built with [Laravel](https://laravel.com)
- Interactive components powered by [Livewire](https://livewire.laravel.com)
- Styled with [Tailwind CSS](https://tailwindcss.com)
- Icons from [Heroicons](https://heroicons.com)

## 📬 Contact

For questions or suggestions, please open an issue on GitHub.

---

**Made with ❤️ for young programmers learning algorithm complexity**
