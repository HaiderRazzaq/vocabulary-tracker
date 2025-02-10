<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vocabulary Tracker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            transition: background-color 0.5s, color 0.5s;
        }

        .dark-mode {
            background-color: #121212;
            color: #ffffff;
        }

        .dark-mode .card,
        .dark-mode .form-control,
        .dark-mode table {
            background-color: #333;
            color: white;
            border-color: white;
        }


        .dark-mode .form-control::placeholder {
            color: #bbb;
        }
    </style>
</head>

<body class="light-mode">
    <div class="container mt-5">
        <h2 class="text-center">English Vocabulary Tracker</h2>
        <button class="btn btn-secondary mb-3" onclick="toggleMode()">Toggle Dark/Light Mode</button>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="card p-4">
            <form method="POST" action="{{ route('word.store') }}">
                @csrf
                <div class="mb-3 d-flex gap-2">
                    <div>
                        <label for="word1" class="form-label">New Word</label>
                        <input type="text" value="{{old('word')}}" id="word1" name="word" class="form-control"
                            placeholder="Enter new word In English" required>
                    </div>
                    <div>
                        <label for="arabic" class="form-label">Meaning in Arabic</label>
                        <input type="text" value="{{old('arabic')}}" id="arabic" name="arabic" class="form-control"
                            placeholder="Enter meaning in Arabic" required>
                    </div>
                </div>

                <div id="examples-container">
                    <div class="mb-3 example-group d-flex align-items-center">
                        <input type="text" name="example[]" class="form-control me-2"
                            placeholder="Enter example sentence" required>
                        <!-- <button type="button" class="btn btn-danger" onclick="removeExample(this)">✖</button> -->
                    </div>
                </div>
                <button type="button" class="btn btn-secondary" onclick="addExample()">Add More Examples</button>
                <button type="submit" class="btn btn-primary">Save Word</button>
            </form>
        </div>
        <table class="table table-striped mt-4">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Word</th>
                    <th>Meaning in Arabic</th>
                    <th>Example</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="words-table">
                @php
                    $i = 1;
                @endphp
                @foreach ($words as $word)
                    <tr>
                        <td>{{ $i }}</td>
                        <td><b>{{ $word->word }}</b></td>
                        <td><b>{{ $word->meaning_arabic }}</b></td>
                        <td>
                            @php
                                $i2 = 1;
                            @endphp
                            @foreach ($word->examples as $example)
                                <b>{{ $i2 . '- ' . $example->sentence }}</b><br>
                                @php
                                    $i2++;
                                @endphp
                            @endforeach
                        </td>
                        <td>
                            <form action="{{ route('word.destroy', $word->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this word?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @php
                        $i++;
                    @endphp
                @endforeach
            </tbody>
        </table>

    </div>
    <script>
        function toggleMode() {
            document.body.classList.toggle("dark-mode");

            let table = document.querySelector("table");

            if (document.body.classList.contains("dark-mode")) {
                localStorage.setItem("darkMode", "enabled");
                if (table) {
                    table.classList.add("table-dark");
                }
            } else {
                localStorage.setItem("darkMode", "disabled");
                if (table) {
                    table.classList.remove("table-dark");
                }
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            if (localStorage.getItem("darkMode") === "enabled") {
                document.body.classList.add("dark-mode");
                let table = document.querySelector("table");
                if (table) {
                    table.classList.add("table-dark");
                }
            }
        });
    </script>

</body>

</html>
