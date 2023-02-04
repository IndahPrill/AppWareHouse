$(function() {
    'use strict'

    getDataStock()
});

function getDataStock() {
    $('#getDataStock').DataTable({
        autoWidth: false,
        lengthMenu: [5, 10, 15, 20, 30, 50, 100],
        pageLength: 5,
        order: [1, 'asc'],
    });
}