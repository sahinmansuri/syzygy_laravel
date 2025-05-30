$(document).ready(function () {

    update_statistics();

    function update_statistics(start = null, end = null) {
        var location_id = '';
        if ($('#dashboard_location').length > 0) {
            location_id = $('#dashboard_location').val();
        }
        var data = { start, end, location_id };
        //get purchase details
        var loader = '<i class="fas fa-sync fa-spin fa-fw margin-bottom"></i>';

        /**
         * @var array
         * Fields to populate on the dashboard
         */
        const fields = [
            //totals
            'total_arrears',
            'total_outstanding',
            'total_disbursed',
            'total_repayment',

            //count
            'no_loans_pending',
            'no_loans_active',
            'no_loans_awaiting_disbursement',
            'no_loans_not_taken_up',
        ];

        //Attach the loader spinner animation to the fields
        for (const field of fields) {
            $(`.${field}`).html(loader);
        }

        $.ajax({
            method: 'get',
            url: '/contact_loan/dashboard/get_totals',
            dataType: 'json',
            data: data,
            success: function (data) {
                for (const field of fields) {
                    /**
                     * @var string
                     * The class that contains the value of the field on tehe dashboard frontend
                     */
                    const _class = `.${field}`;

                    /**
                     * @var float 
                     * The value of that field fetched from the server
                     * Currency values are formatted
                     */
                    const value = is_count(field) ? data[field] : __currency_trans_from_en(data[field], true);

                    $(_class).html(value);
                }
            },
        });

        function is_count(field) {
            return field.includes('no_');
        }
    }


});