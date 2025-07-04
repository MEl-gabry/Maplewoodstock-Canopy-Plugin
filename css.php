<?php
    function canopy_css()
    {
        echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        <style>
            .dash-option {
                width: 338px;
                height: 93.24px;
            }

            .display-option {
                width: 300px;
                height: 150px;
            }

            .search-entries-option {
                width: 143px;
                height: 56px;
            }

            .below-table-option {
                width: 210px;
                height: 60px;
            }

            .modal-dialog {
                min-height: calc(100vh - 60px);
                display: flex;
                flex-direction: column;
                justify-content: center;
                overflow: auto;
            }
            
            @media(max-width: 768px) {
              .modal-dialog {
                min-height: calc(100vh - 20px);
              }
            }
        </style>
        ';
    }
?>