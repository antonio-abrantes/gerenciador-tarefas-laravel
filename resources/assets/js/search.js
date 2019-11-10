// alert("Entrou no search.js");

$(document).ready(function() {
    $('#task_search').keyup(function() {
        $.ajax({

            url: "http://tasks.test/tasks/search",


            dataType: "json",
            type: "post",
            data: {
                search: $('#task_search').val()
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(result) {
                var items = '';

                for (var i in result) {
                    var id = result[i]['id'];

                    items += '<tr>';
                    items += '<td>' + id + '</td>';
                    items += '<td><a href="http://tasks.test/tasks/' + id  + '">' + result[i]['subject'] + '</a></td>';
                    items += '<td>' + ((result[i]['made'] == 1) ? 'sim' : 'não') + '</td>';
                    items += '<td>' + result[i]['description'] + '</td>';

                    items += '<td>';
                    items += '<a class="btn btn-success"  href="http://tasks.test/tasks/' + id + '/edit">Editar</a>'
                    items += '<a class="btn btn-danger">Deletar</a>'
                    items += '<td>';

                    items += '</tr>';
                }

                $('#task_list').html(items);
            }

        })
    });
});