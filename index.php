<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sakda_63110282</title>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

</head>
<body>
    <button id="btnBack"> back </button>
    <div id="main">
        <table>
            <thead>
                <tr>
                    <th>ID</th> <th>Title</th><th> Details </th>
                </tr>
            </thead>
            <tbody id="tblPosts">
            </tbody>
        </table>
    </div>
    <div id="detail">
        <table>
            <thead>
                <tr>
                    <th>ID</th> <th>Title</th><th>Author</th>
                </tr>
            </thead>
            <tbody id="tbldetail">
            </tbody>
        </table>
    </div>
    <hr>
    <div id="comment">
        <table>
            <thead>
                <tr>
                    <th>ID</th> <th>Comment</th><th>Author</th>
                </tr>
            </thead>
            <tbody id="tblcomment">
            </tbody>
        </table>
    </div>
        
    </body>
    <script>
        function showcomment(id){
            $("#main").hide();
            $("#comment").show();
            var url = "https://jsonplaceholder.typicode.com/posts/comments"+id
            $.getJSON(url)
                .done((data)=>{
                    console.log(data);                    
                    var line = "<tr id='detail_comment'";
                        line += "><td>" + data.id + "</td>"
                        line += "<td><b>" + data.name + "</b><br/>"
                        line += "<td><b>" + data.email + "</b><br/>"
                        line += data.body + "</td>"
                        line += "<td>" + data.postId + "</td>"
                        line += "</tr>";
                        $("#tblcomment").append(line);
                })
                .fail((xhr, err, status) => {

                })
        }
        function showDetails(id){
            $("#main").hide();
            $("#detail").show();
            var url = "https://jsonplaceholder.typicode.com/posts/"+id
            $.getJSON(url)
                .done((data)=>{
                    console.log(data);                    
                    var line = "<tr id='detail_title'";
                        line += "><td>" + data.id + "</td>"
                        line += "<td><b>" + data.title + "</b><br/>"
                        line += data.body + "</td>"
                        line += "<td>" + data.userId + "</td>"
                        line += "</tr>";
                        $("#tbldetail").append(line);
                })
                .fail((xhr, err, status) => {

                })
        }
        function loadPosts(){
            $("#main").show();
            $("#detail").hide();
            
            var url = "https://jsonplaceholder.typicode.com/posts";
            $.getJSON(url)
                .done((data)=>{
                    $.each(data, (k, item)=>{
                        console.log(item);
                        var line = "<tr>";
                            line += "<td>"+ item.id + "</td>";
                            line += "<td><b>"+ item.title + "</b><br/>";
                            line += item.body + "</td>";
                            line += "<td> <button onClick='showDetails("+ item.id +");' > link </button> </td>";
                            line += "</tr>";
                        $("#tblPosts").append(line);
                    });
                    $("#main").show();
                })
                .fail((xhr, status, error)=>{
                })
        }
        $(()=>{
            loadPosts();
            $("#btnBack").click(() => {
                $("#detail_title").remove();
                $("#detail").hide();
                $("#main").show();
            $("#detail").hide();
            $("#comment").hide();
            
            });
        })
    </script>
    </html>
