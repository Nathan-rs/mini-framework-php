<footer class="footer">
    <span x-text="`${count} item left`"></span>
    <form action="" method="POST">
        <ul class="content">
            <li class="content-filter">
                <input type="button" name="all" value="All" class="btn-filter">
                <input type="button" name="active" value="Active" class="btn-filter">
                <input type="button" name="completed" value="Completed" class="btn-filter">
            </li>
        </ul>
    </form>
    <button id="count-task">Clear completed</button>
</footer>