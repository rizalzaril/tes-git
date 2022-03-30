<!doctype html>
<html>

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic dependent dropdown in CodeIgniter 3 with AJAX</title>
</head>

<body>
    <p style='color: red;'>Select a city then department and user from the dropdowns.</p>
    <table border='0'>

        <!-- City -->
        <tr>
            <td>City</td>
            <td>
                <select id='sel_city'>
                    <option>-- Select city --</option>
                    <?php
					foreach ($cities as $city) {

						echo "<option value='" . $city['id'] . "'>" . $city['cityname'] . "</option>";
					}
					?>
                </select>
            </td>
        </tr>

        <!-- Department -->
        <tr>
            <td>Department</td>
            <td>
                <select id='sel_depart'>
                    <option>-- Select deparment --</option>
                </select>
            </td>
        </tr>

        <!-- User -->
        <tr>
            <td>User</td>
            <td>
                <select id='sel_user'>
                    <option>-- Select user --</option>
                </select>
            </td>
        </tr>
    </table>

    <!-- Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script type='text/javascript'>
    // baseURL variable
    var baseURL = "<?php echo base_url(); ?>";

    $(document).ready(function() {

        // City change
        $('#sel_city').change(function() {
            var city = $(this).val();

            // AJAX request
            $.ajax({
                url: '<?= base_url() ?>index.php/User/getCityDepartment',
                method: 'post',
                data: {
                    city: city
                },
                dataType: 'json',
                success: function(response) {

                    // Remove options
                    $('#sel_user').find('option').not(':first').remove();
                    $('#sel_depart').find('option').not(':first').remove();

                    // Add options
                    $.each(response, function(index, data) {
                        $('#sel_depart').append('<option value="' + data['id'] +
                            '">' + data['depart_name'] + '</option>');
                    });
                }
            });
        });

        // Department change
        $('#sel_depart').change(function() {
            var department = $(this).val();

            // AJAX request
            $.ajax({
                url: '<?= base_url() ?>index.php/User/getDepartmentUsers',
                method: 'post',
                data: {
                    department: department
                },
                dataType: 'json',
                success: function(response) {

                    // Remove options
                    $('#sel_user').find('option').not(':first').remove();

                    // Add options
                    $.each(response, function(index, data) {
                        $('#sel_user').append('<option value="' + data['id'] +
                            '">' + data['name'] + '</option>');
                    });
                }
            });
        });

    });
    </script>
</body>


</html>
