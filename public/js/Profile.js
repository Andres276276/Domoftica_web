$(document).ready(function() {
    $('#toggle').change(function() {
        var toggleValue = this.checked ? 'on' : 'off';
        
        $.ajax({
            type: 'POST',
            url: "{{ route('update.relay.state') }}",
            data: {
                _token: "{{ csrf_token() }}",
                toggle: toggleValue
            },
            success: function(data) {
            },
            error: function() {
            }
        });
    });
});