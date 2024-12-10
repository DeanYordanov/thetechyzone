jQuery(document).ready(function($) {
    // When a brand cell is clicked
    $('.brand-item').on('click', function() {
        var brandId = $(this).data('brand-id'); // Get the brand ID from the data attribute

        // Send AJAX request to update the click count
        $.ajax({
            url: joh_ajax_filter.ajax_url, // Use joh_ajax_filter instead of myPluginAjax
            method: 'POST',
            data: {
                action: 'joh_track_brand_clicks',
                post_id: brandId,
                nonce: joh_ajax_filter.nonce // Pass the nonce for security
            },
            success: function(response) {
                if (response.success) {
                    // Update the click count displayed on the page
                    $('.clicks-count[data-brand-id="' + brandId + '"]').text('Clicks: ' + response.data.clicks);
                } else {
                    console.error('Failed to update clicks:', response.data);
                }
            },
            error: function(error) {
                console.error('AJAX error:', error);
            }
        });
    });
});
