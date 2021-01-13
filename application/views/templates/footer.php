        </div>
        <script>
            CKEDITOR.replace('editor1');

            $(document).ready(function() {

                var Create = Backbone.Model.extend({
                    url: function() {
                        var link = "<?php echo base_url(); ?>wishes/create";
                        return link;
                    },
                    defaults: {
                        title: null,
                        body: null,
                    }
                });

                var createModel = new Create();

                var DisplayView = Backbone.View.extend({
                    el: ".container",
                    model: createModel,
                    initialize: function() {
                        this.listenTo(this.model, "sync change", this.gotdata);
                    },

                    events: {
                        "click #create": "getdata"
                    },

                    getdata: function(event) {
                        var title = $('input#title').val();
                        var body = $('input#body').val();
                        this.model.set({
                            title: title,
                            body: body
                        });
                        this.model.fetch();
                    },

                    gotdata: function() {
                        $('#createmsg').html('Wish ' + this.model.get('title') + ' - ' + this.model.get('body') + ' has been created').show().fadeOut(5000);
                    }
                });

                var displayView = new DisplayView();

            });

        </script>
        </body>

        </html>