jQuery(function ($) {
    var VP_PFUI = VP_PFUI || {};
    // Gallery Management
    var postId = $('#post_ID').val(),
            $gallery = $('.vp-pfui-gallery-picker .gallery');
    VPPFUIMediaControl = {
        // Init a new media manager or returns existing frame
        frame: function () {
            if (this._frame)
                return this._frame;
            this._frame = wp.media({
    
                library: {
                    type: 'image'
                },
                button: {
                },
                multiple: true
            });
            this._frame.on('open', this.updateFrame).state('library').on('select', this.select);
            return this._frame;
        },
        select: function () {
            var selection = this.get('selection');
            selection.each(function (model) {
                var thumbnail = model.attributes.url;
                if (model.attributes.sizes !== undefined && model.attributes.sizes.thumbnail !== undefined)
                    thumbnail = model.attributes.sizes.thumbnail.url;
                $gallery.append('<span data-id="' + model.id + '" title="' + model.attributes.title + '"><img src="' + thumbnail + '" /><span class="close">x</span></span>');
                $gallery.trigger('update');
            });
        },
        updateFrame: function () {
        },
        init: function () {
            $('#wpbody').on('click', '.vp-pfui-gallery-button', function (e) {
                e.preventDefault();
                VPPFUIMediaControl.frame().open();
            });
        }
    }
    VPPFUIMediaControl.init();
    $gallery.on('update', function () {
        var ids = [];
        $(this).find('> span').each(function () {
            ids.push($(this).data('id'));
        });
        console.log(this);
        $(this).next().val(ids.join(','));
    });
    $gallery.sortable({
        placeholder: "vp-pfui-ui-state-highlight",
        revert: 200,
        tolerance: 'pointer',
        stop: function () {
            $gallery.trigger('update');
        }
    });
    $gallery.on('click', 'span.close', function (e) {
        $(this).parent().fadeOut(200, function () {
            $(this).remove();
            $gallery.trigger('update');
        });
    });
});
 