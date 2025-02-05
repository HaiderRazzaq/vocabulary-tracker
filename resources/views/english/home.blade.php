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
        .dark-mode .table {
            background-color: #1e1e1e;
            color: #ffffff;
            border-color: #444;
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
        <div class="card p-4">
            <form method="POST" action="/save-word">
                <div class="mb-3 d-flex gap-2">
                    <div>
                        <label for="word1" class="form-label">New Word</label>
                        <input type="text" id="word1" name="word" class="form-control"
                            placeholder="Enter new word In English" required>
                    </div>
                    <div>
                        <label for="arabic" class="form-label">Meaning in Arabic</label>
                        <input type="text" id="arabic" name="arabic" class="form-control"
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
                    <td>{{ $i }}</td>
                    <td><b>
                        {{ $word->word }}</td>
                        </b>
                    <td><b>{{ $word->meaning_arabic }}</b></td>
                    <td>
                        @php
                            $i2 = 1;
                        @endphp
                        @foreach ($word->examples as $examples)
                    <b>{{ $i2 . '- ' . $examples->sentence  }}</b> <br>
                        @php
                            $i2++;
                        @endphp
                        @endforeach
                    </td>
                    <td>iwfdf</td>
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
        }

        function addExample() {
            let container = document.getElementById("examples-container");
            let div = document.createElement("div");
            div.classList.add("mb-3", "example-group", "d-flex", "align-items-center");
            div.innerHTML =
                '<input type="text" name="example[]" class="form-control me-2" placeholder="Enter another example sentence" required>' +
                '<button type="button" class="btn btn-danger" onclick="removeExample(this)">✖</button>';
            container.appendChild(div);
        }

        function removeExample(button) {
            button.parentElement.remove();
        }

        function removeWord(button) {
            button.closest("tr").remove();
        }
    </script>
</body>

</html>
