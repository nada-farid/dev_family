
<label>نتيجة البحث</label>
<select class="form-control select2" name="result" id="result">
    @foreach($result['data'] as $row)
        <option value="{{ $row['id'] }}" 
                data-name="{{ $row['fullName'] }}" 
                data-identity="{{ $row['nationalID'] }}" 
                data-phone={{ $row['phoneNo'] }} 
                data-address="{{ $row['currentAddress'] }}">

                {{ $row['fullName'] }} - {{ $row['nationalID'] }} 
        </option>
    @endforeach
</select>

<script> 
    $('.select2').select2();
    $('#result').on('change', function() {
        var selectedOption = $(this).find('option:selected'); // Get the selected option
        var name = selectedOption.data('name');
        var identity = selectedOption.data('identity');
        var phone = selectedOption.data('phone');
        var address = selectedOption.data('address');

        $('#name').val(name);
        $('#address').val(address);
        $('#phone').val(phone);
        $('#identity').val(identity);
        $('#identity_num').val(identity);
    });
    // Set the first option as selected by default and trigger change event
    $('#result').val($('#result option:first').val()).trigger('change');
</script>