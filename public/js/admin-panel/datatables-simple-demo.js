window.addEventListener('DOMContentLoaded', event => {
    // Simple-DataTables
    // https://github.com/fiduswriter/Simple-DataTables/wiki

    const usersTable = document.getElementById('users_table');
    if (usersTable) {
        new simpleDatatables.DataTable(usersTable);
    }

    const housesTable = document.getElementById('houses_table');
    if (housesTable) {
        new simpleDatatables.DataTable(housesTable);
    }


    const ordersTable = document.getElementById('orders_table');
    if (ordersTable) {
        new simpleDatatables.DataTable(ordersTable);
    }

    const featuresTable = document.getElementById('features_table');
    if (featuresTable) {
        new simpleDatatables.DataTable(featuresTable);
    }

    const commentsTable = document.getElementById('comments_table');
    if (commentsTable) {
        new simpleDatatables.DataTable(commentsTable);
    }
});
