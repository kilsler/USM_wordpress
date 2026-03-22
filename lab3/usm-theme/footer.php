<footer>
    <p>© 2026 Блог про пингвинов</p>
</footer>

<?php wp_footer(); ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const toggle = document.getElementById('sidebar-toggle');
    const sidebar = document.querySelector('aside');
    const content = document.querySelector('.site-content');

    toggle.addEventListener('click', function() {
        sidebar.classList.toggle('active');


        if(sidebar.classList.contains('active')) {
            content.style.width = '70%';
        } else {
            content.style.width = '100%';
        }
    });
});
</script>
</body>
</html>
