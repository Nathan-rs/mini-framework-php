{% import '/todos/partials/item.twig.php' as item %}

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/reset.css">
    <link rel="stylesheet" href="/assets/css/styles-copy.css">

    <!-- AlpineJs Import CDN -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <title>App Todo AlphineJs</title>
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <span class="title">{{ title }}</span>

            <div class="main" x-data="{ count: 0 }"
                @update-count.window="count = count + $event.detail"
                @remove-task.window="count = Math.max(0, count - 1)">

                <div class="search-todo">
                    <input type="text" name="add" placeholder="Adicione sua task aqui..." />
                </div>

                <div class="content-list">
                    <ul class="tasks-list">

                        {% for todo in todos %}
                        {{ item.todoItem(todo.title, todo.description, todo.isFinished) }}
                        {% endfor %}

                    </ul>
                </div>

                {% include 'todos/partials/footer.twig.php' %}
            </div>
        </div>
    </div>
    <!-- <script src="/assets/js/script.js"></script> -->
</body>

</html>