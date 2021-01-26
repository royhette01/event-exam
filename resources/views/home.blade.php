<!DOCTYPE html>
<html>

<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.8.18/themes/smoothness/jquery-ui.css" />
    <link href="{{ asset('css/calendar.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i"
        rel="stylesheet">
</head>

<body>
    <div class="row">
        <div class="col-md-4 card text-left">

        
            <form id="my-form" action='{{url("api/calendar/")}}'>

                <div class="form-group">
                    <label for="exampleInputEmail1">Event</label>
                    <input type="text" class="form-control" name="name">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Date From</label>
                    <input type="text" class="form-control datepicker" name="date_from">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Date To</label>
                    <input type="text" class="form-control datepicker" name="date_to">
                </div>

                <div class="form-group">
                    <input class="form-check-input" type="checkbox" name="days[]" value="monday">
                    <label class="form-check-label">
                        Monday
                    </label>

                    <input class="form-check-input" type="checkbox" name="days[]" value="tuesday">
                    <label class="form-check-label">
                        Tuesday
                    </label>

                    <input class="form-check-input" type="checkbox" name="days[]" value="wednesday">
                    <label class="form-check-label">
                        Wednesday
                    </label>

                    <input class="form-check-input" type="checkbox" name="days[]" value="thursday">
                    <label class="form-check-label">
                        Thursday
                    </label>

                    <input class="form-check-input" type="checkbox" name="days[]" value="friday">
                    <label class="form-check-label">
                        Friday
                    </label>
                    <br>
                    <input class="form-check-input" type="checkbox" name="days[]" value="saturday">
                    <label class="form-check-label">
                        Saturday
                    </label>

                    <input class="form-check-input" type="checkbox" name="days[]" value="sunday">
                    <label class="form-check-label">
                        Sunday
                    </label>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="col-md-8">
            <div id='wrap'>
                <div id='calendar'></div>
                <div style='clear:both'></div>
            </div>
        </div>
    </div>

</body>
<div id="loading">
    <div id="loader">
    </div>
</div>
<input type="hidden" id="url" value='{{url("api/calendar/")}}'>

</html>

<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.1/jquery-ui.min.js"
    integrity="sha256-4JY5MVcEmAVSuS6q4h9mrwCm6KNx91f3awsSQgwu0qc=" crossorigin="anonymous"></script>
<script src="{{ asset('js/calendar.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>