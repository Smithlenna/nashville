/*!
 *
 * Angle - Bootstrap Admin App + jQuery
 *
 * Version: 3.2.0
 * Author: @themicon_co
 * Website: http://themicon.co
 * License: https://wrapbootstrap.com/help/licenses
 *
 */

$(window).load(function () {
    $('#loader-wrapper').delay(250).fadeOut(function () {
        $('#loader-wrapper').remove();
    });
});
// Start Bootstrap JS
// -----------------------------------

(function (window, document, $, undefined) {

    $(function () {

        // POPOVER
        // -----------------------------------
        $('[data-toggle="popover"]').popover();
        $('.offsidebar.hide').removeClass('hide');

        // TOOLTIP
        // -----------------------------------

        $('[data-toggle="tooltip"]').tooltip({
            container: 'body'
        });

        // DROPDOWN INPUTS
        // -----------------------------------
        $('.dropdown input').on('click focus', function (event) {
            event.stopPropagation();
        });

    });

})(window, document, window.jQuery);

/**=========================================================
 * Module: clear-storage.js
 * Removes a key from the browser storage via element click
 =========================================================*/

(function ($, window, document) {
    'use strict';

    var Selector = '[data-reset-key]';

    $(document).on('click', Selector, function (e) {
        e.preventDefault();
        var key = $(this).data('resetKey');

        if (key) {
            $.localStorage.remove(key);
            // reload the page
            window.location.reload();
        } else {
            $.error('No storage key specified for reset.');
        }
    });

}(jQuery, window, document));

// GLOBAL CONSTANTS
// -----------------------------------


(function (window, document, $, undefined) {

    window.APP_COLORS = {
        'primary': '#5d9cec',
        'success': '#27c24c',
        'info': '#23b7e5',
        'warning': '#ff902b',
        'danger': '#f05050',
        'inverse': '#131e26',
        'green': '#37bc9b',
        'pink': '#f532e5',
        'purple': '#7266ba',
        'dark': '#1e1e2d',
        'yellow': '#fad732',
        'gray-darker': '#232735',
        'gray-dark': '#1e1e2d',
        'gray': '#dde6e9',
        'gray-light': '#e4eaec',
        'gray-lighter': '#edf1f2'
    };

    window.APP_MEDIAQUERY = {
        'desktopLG': 1200,
        'desktop': 992,
        'tablet': 768,
        'mobile': 480
    };

})(window, document, window.jQuery);

// SIDEBAR
// -----------------------------------


(function (window, document, $, undefined) {

    var $win;
    var $html;
    var $body;
    var $sidebar;
    var mq;

    $(function () {

        $win = $(window);
        $html = $('html');
        $body = $('body');
        $sidebar = $('.sidebar');
        mq = APP_MEDIAQUERY;

        // AUTOCOLLAPSE ITEMS
        // -----------------------------------

        var sidebarCollapse = $sidebar.find('.collapse');
        sidebarCollapse.on('show.bs.collapse', function (event) {

            event.stopPropagation();
            if ($(this).parents('.collapse').length === 0)
                sidebarCollapse.filter('.in').collapse('hide');

        });

        // SIDEBAR ACTIVE STATE
        // -----------------------------------

        // Find current active item
        var currentItem = $('.sidebar .active').parents('li');

        // hover mode don't try to expand active collapse
        if (!useAsideHover())
            currentItem
                .addClass('active')     // activate the parent
                .children('.collapse')  // find the collapse
                .collapse('show');      // and show it

        // remove this if you use only collapsible sidebar items
        $sidebar.find('li > a + ul').on('show.bs.collapse', function (e) {
            if (useAsideHover()) e.preventDefault();
        });

        // SIDEBAR COLLAPSED ITEM HANDLER
        // -----------------------------------


        var eventName = isTouch() ? 'click' : 'mouseenter';
        var subNav = $();
        $sidebar.on(eventName, '.nav > li', function () {

            if (isSidebarCollapsed() || useAsideHover()) {

                subNav.trigger('mouseleave');
                subNav = toggleMenuItem($(this));

                // Used to detect click and touch events outside the sidebar
                sidebarAddBackdrop();
            }

        });

        var sidebarAnyclickClose = $sidebar.data('sidebarAnyclickClose');

        // Allows to close
        if (typeof sidebarAnyclickClose !== 'undefined') {

            $('.wrapper').on('click.sidebar', function (e) {
                // don't check if sidebar not visible
                if (!$body.hasClass('aside-toggled')) return;

                var $target = $(e.target);
                if (!$target.parents('.aside').length && // if not child of sidebar
                    !$target.is('#user-block-toggle') && // user block toggle anchor
                    !$target.parent().is('#user-block-toggle') // user block toggle icon
                ) {
                    $body.removeClass('aside-toggled');
                }

            });
        }

    });

    function sidebarAddBackdrop() {
        var $backdrop = $('<div/>', {'class': 'dropdown-backdrop'});
        $backdrop.insertAfter('.aside').on("click mouseenter", function () {
            removeFloatingNav();
        });
    }

    // Open the collapse sidebar submenu items when on touch devices
    // - desktop only opens on hover
    function toggleTouchItem($element) {
        $element
            .siblings('li')
            .removeClass('open')
            .end()
            .toggleClass('open');
    }

    // Handles hover to open items under collapsed menu
    // -----------------------------------
    function toggleMenuItem($listItem) {

        removeFloatingNav();

        var ul = $listItem.children('ul');

        if (!ul.length) return $();
        if ($listItem.hasClass('open')) {
            toggleTouchItem($listItem);
            return $();
        }

        var $aside = $('.aside');
        var $asideInner = $('.aside-inner'); // for top offset calculation
        // float aside uses extra padding on aside
        var mar = parseInt($asideInner.css('padding-top'), 0) + parseInt($aside.css('padding-top'), 0);

        var subNav = ul.clone().appendTo($aside);

        toggleTouchItem($listItem);

        var itemTop = ($listItem.position().top + mar) - $sidebar.scrollTop();
        var vwHeight = $win.height();

        subNav
            .addClass('nav-floating')
            .css({
                position: isFixed() ? 'fixed' : 'absolute',
                top: itemTop,
                bottom: (subNav.outerHeight(true) + itemTop > vwHeight) ? 0 : 'auto'
            });

        subNav.on('mouseleave', function () {
            toggleTouchItem($listItem);
            subNav.remove();
        });

        return subNav;
    }

    function removeFloatingNav() {
        $('.sidebar-subnav.nav-floating').remove();
        $('.dropdown-backdrop').remove();
        $('.sidebar li.open').removeClass('open');
    }

    function isTouch() {
        return $html.hasClass('touch');
    }

    function isSidebarCollapsed() {
        return $body.hasClass('aside-collapsed');
    }

    function isSidebarToggled() {
        return $body.hasClass('aside-toggled');
    }

    function isMobile() {
        return $win.width() < mq.tablet;
    }

    function isFixed() {
        return $body.hasClass('layout-fixed');
    }

    function useAsideHover() {
        return $body.hasClass('aside-hover');
    }

})(window, document, window.jQuery);

// TOGGLE STATE
// -----------------------------------

(function (window, document, $, undefined) {

    $(function () {

        var $body = $('body');
        toggle = new StateToggler();

        $('[data-toggle-state]')
            .on('click', function (e) {
                // e.preventDefault();
                e.stopPropagation();
                var element = $(this),
                    classname = element.data('toggleState'),
                    target = element.data('target'),
                    noPersist = (element.attr('data-no-persist') !== undefined);

                // Specify a target selector to toggle classname
                // use body by default
                var $target = target ? $(target) : $body;

                if (classname) {
                    if ($target.hasClass(classname)) {
                        $target.removeClass(classname);
                        if (!noPersist)
                            toggle.removeState(classname);
                    } else {
                        $target.addClass(classname);
                        if (!noPersist)
                            toggle.addState(classname);
                    }

                }
                // some elements may need this when toggled class change the content size
                // e.g. sidebar collapsed mode and jqGrid
                $(window).resize();

            });

    });

    // Handle states to/from localstorage
    window.StateToggler = function () {

        var storageKeyName = 'jq-toggleState';

        // Helper object to check for words in a phrase //
        var WordChecker = {
            hasWord: function (phrase, word) {
                return new RegExp('(^|\\s)' + word + '(\\s|$)').test(phrase);
            },
            addWord: function (phrase, word) {
                if (!this.hasWord(phrase, word)) {
                    return (phrase + (phrase ? ' ' : '') + word);
                }
            },
            removeWord: function (phrase, word) {
                if (this.hasWord(phrase, word)) {
                    return phrase.replace(new RegExp('(^|\\s)*' + word + '(\\s|$)*', 'g'), '');
                }
            }
        };

        // Return service public methods
        return {
            // Add a state to the browser storage to be restored later
            addState: function (classname) {
                var data = $.localStorage.get(storageKeyName);

                if (!data) {
                    data = classname;
                } else {
                    data = WordChecker.addWord(data, classname);
                }

                $.localStorage.set(storageKeyName, data);
            },

            // Remove a state from the browser storage
            removeState: function (classname) {
                var data = $.localStorage.get(storageKeyName);
                // nothing to remove
                if (!data) return;

                data = WordChecker.removeWord(data, classname);

                $.localStorage.set(storageKeyName, data);
            },

            // Load the state string and restore the classlist
            restoreState: function ($elem) {
                var data = $.localStorage.get(storageKeyName);

                // nothing to restore
                if (!data) return;
                $elem.addClass(data);
            }

        };
    };

})(window, document, window.jQuery);

/**=========================================================
 * Module: utils.js
 * jQuery Utility functions library
 * adapted from the core of UIKit
 =========================================================*/

(function ($, window, doc) {
    'use strict';

    var $html = $("html"), $win = $(window);

    $.support.transition = (function () {

        var transitionEnd = (function () {

            var element = doc.body || doc.documentElement,
                transEndEventNames = {
                    WebkitTransition: 'webkitTransitionEnd',
                    MozTransition: 'transitionend',
                    OTransition: 'oTransitionEnd otransitionend',
                    transition: 'transitionend'
                }, name;

            for (name in transEndEventNames) {
                if (element.style[name] !== undefined) return transEndEventNames[name];
            }
        }());

        return transitionEnd && {end: transitionEnd};
    })();

    $.support.animation = (function () {

        var animationEnd = (function () {

            var element = doc.body || doc.documentElement,
                animEndEventNames = {
                    WebkitAnimation: 'webkitAnimationEnd',
                    MozAnimation: 'animationend',
                    OAnimation: 'oAnimationEnd oanimationend',
                    animation: 'animationend'
                }, name;

            for (name in animEndEventNames) {
                if (element.style[name] !== undefined) return animEndEventNames[name];
            }
        }());

        return animationEnd && {end: animationEnd};
    })();

    $.support.requestAnimationFrame = window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.msRequestAnimationFrame || window.oRequestAnimationFrame || function (callback) {
        window.setTimeout(callback, 1000 / 60);
    };
    $.support.touch = (
        ('ontouchstart' in window && navigator.userAgent.toLowerCase().match(/mobile|tablet/)) ||
        (window.DocumentTouch && document instanceof window.DocumentTouch) ||
        (window.navigator['msPointerEnabled'] && window.navigator['msMaxTouchPoints'] > 0) || //IE 10
        (window.navigator['pointerEnabled'] && window.navigator['maxTouchPoints'] > 0) || //IE >=11
        false
    );
    $.support.mutationobserver = (window.MutationObserver || window.WebKitMutationObserver || window.MozMutationObserver || null);

    $.Utils = {};

    $.Utils.debounce = function (func, wait, immediate) {
        var timeout;
        return function () {
            var context = this, args = arguments;
            var later = function () {
                timeout = null;
                if (!immediate) func.apply(context, args);
            };
            var callNow = immediate && !timeout;
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
            if (callNow) func.apply(context, args);
        };
    };

    $.Utils.removeCssRules = function (selectorRegEx) {
        var idx, idxs, stylesheet, _i, _j, _k, _len, _len1, _len2, _ref;

        if (!selectorRegEx) return;

        setTimeout(function () {
            try {
                _ref = document.styleSheets;
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    stylesheet = _ref[_i];
                    idxs = [];
                    stylesheet.cssRules = stylesheet.cssRules;
                    for (idx = _j = 0, _len1 = stylesheet.cssRules.length; _j < _len1; idx = ++_j) {
                        if (stylesheet.cssRules[idx].type === CSSRule.STYLE_RULE && selectorRegEx.test(stylesheet.cssRules[idx].selectorText)) {
                            idxs.unshift(idx);
                        }
                    }
                    for (_k = 0, _len2 = idxs.length; _k < _len2; _k++) {
                        stylesheet.deleteRule(idxs[_k]);
                    }
                }
            } catch (_error) {
            }
        }, 0);
    };

    $.Utils.isInView = function (element, options) {

        var $element = $(element);

        if (!$element.is(':visible')) {
            return false;
        }

        var window_left = $win.scrollLeft(),
            window_top = $win.scrollTop(),
            offset = $element.offset(),
            left = offset.left,
            top = offset.top;

        options = $.extend({topoffset: 0, leftoffset: 0}, options);

        if (top + $element.height() >= window_top && top - options.topoffset <= window_top + $win.height() &&
            left + $element.width() >= window_left && left - options.leftoffset <= window_left + $win.width()) {
            return true;
        } else {
            return false;
        }
    };

    $.Utils.options = function (string) {

        if ($.isPlainObject(string)) return string;

        var start = (string ? string.indexOf("{") : -1), options = {};

        if (start != -1) {
            try {
                options = (new Function("", "var json = " + string.substr(start) + "; return JSON.parse(JSON.stringify(json));"))();
            } catch (e) {
            }
        }

        return options;
    };

    $.Utils.events = {};
    $.Utils.events.click = $.support.touch ? 'tap' : 'click';

    $.langdirection = $html.attr("dir") == "rtl" ? "right" : "left";

    $(function () {

        // Check for dom modifications
        if (!$.support.mutationobserver) return;

        // Install an observer for custom needs of dom changes
        var observer = new $.support.mutationobserver($.Utils.debounce(function (mutations) {
            $(doc).trigger("domready");
        }, 300));

        // pass in the target node, as well as the observer options
        observer.observe(document.body, {childList: true, subtree: true});

    });

    // add touch identifier class
    $html.addClass($.support.touch ? "touch" : "no-touch");

}(jQuery, window, document));

// FULLSCREEN
// -----------------------------------

(function (window, document, $, undefined) {

    if (typeof screenfull === 'undefined') return;

    $(function () {

        var $doc = $(document);
        var $fsToggler = $('[data-toggle-fullscreen]');

        // Not supported under IE
        var ua = window.navigator.userAgent;
        if (ua.indexOf("MSIE ") > 0 || !!ua.match(/Trident.*rv\:11\./)) {
            $fsToggler.addClass('hide');
        }

        if (!$fsToggler.is(':visible')) // hidden on mobiles or IE
            return;

        $fsToggler.on('click', function (e) {
            e.preventDefault();

            if (screenfull.enabled) {

                screenfull.toggle();

                // Switch icon indicator
                toggleFSIcon($fsToggler);

            } else {
                console.log('Fullscreen not enabled');
            }
        });

        if (screenfull.raw && screenfull.raw.fullscreenchange)
            $doc.on(screenfull.raw.fullscreenchange, function () {
                toggleFSIcon($fsToggler);
            });

        function toggleFSIcon($element) {
            if (screenfull.isFullscreen)
                $element.children('em').removeClass('fa-expand').addClass('fa-compress');
            else
                $element.children('em').removeClass('fa-compress').addClass('fa-expand');
        }

    });

})(window, document, window.jQuery);
// Select2
// -----------------------------------


(function (window, document, $, undefined) {

    $(function () {
        var maincss = $('#maincss');
        var bscss = $('#bscss');
        $('#chk-rtl').on('change', function () {
            // app rtl check
            maincss.attr('href', this.checked ? '../../assets/css/app-rtl.css' : "../../assets/css/app.css");
            // bootstrap rtl check
            bscss.attr('href', this.checked ? '../../assets/css/bootstrap-rtl.css' : '../../assets/css/bootstrap.css');

        });

    });

})(window, document, window.jQuery);
// LOAD CUSTOM CSS
// -----------------------------------

(function (window, document, $, undefined) {

    $(function () {

        $('[data-load-css]').on('click', function (e) {

            var element = $(this);

            if (element.is('a'))
                e.preventDefault();

            var uri = element.data('loadCss'),
                link;

            if (uri) {
                link = createLink(uri);
                if (!link) {
                    $.error('Error creating stylesheet link element.');
                }
            } else {
                $.error('No stylesheet location defined.');
            }

        });
    });

    function createLink(uri) {
        var linkId = 'autoloaded-stylesheet',
            oldLink = $('#' + linkId).attr('id', linkId + '-old');

        $('head').append($('<link/>').attr({
            'id': linkId,
            'rel': 'stylesheet',
            'href': uri
        }));

        if (oldLink.length) {
            oldLink.remove();
        }

        return $('#' + linkId);
    }


})(window, document, window.jQuery);

(function (window, document, $, undefined) {

    $(function () {

        $('[data-check-all]').on('change', function () {
            var $this = $(this),
                index = $this.index() + 1,
                checkbox = $this.find('input[type="checkbox"]'),
                table = $this.parents('table');
            // Make sure to affect only the correct checkbox column
            table.find('tbody > tr > td:nth-child(' + index + ') input[type="checkbox"]')
                .prop('checked', checkbox[0].checked);

        });


    });

    /*
     * Select All select
     */
    $(function () {
        $('#parent_present').on('change', function () {
            $('.child_present').prop('checked', $(this).prop('checked'));
        });
        $('.child_present').on('change', function () {
            $('.child_present').prop($('.child_present:checked').length ? true : false);
        });
        $('#parent_absent').on('change', function () {
            $('.child_absent').prop('checked', $(this).prop('checked'));
        });
        $('.child_absent').on('change', function () {
            $('.child_absent').prop($('.child_absent:checked').length ? true : false);
        });
    });
    $('#check_related').change(function () {
        $('.company').hide()
        $(".company").attr('disabled', 'disabled');
    });

    var client_stusus = $('#client_stusus').val();
    if (client_stusus == '2') {
        $(".company").removeAttr('disabled');
    } else {
        $(".company").attr('disabled', 'disabled');
        $('.company').hide()
    }

    // ************* CRM ********************
    $(function () {

        $('.hideshow').click(function () {
            if ($(this).data('result') == 'show' && this.checked) {
                $('div#date_contacted').show();
            } else {
                $('div#date_contacted').hide();
            }
        });
        $('input[id="showhide"]').click(function () {
            if (this.checked) {
                $('div#shresult').hide();
            } else {
                $('div#shresult').show();
            }
        });

        $('input[id="use_postmark"]').click(function () {
            if (this.checked) {
                $('#postmark_config').show();
            } else {
                $('#postmark_config').hide();
            }
        });
        $('input[id="for_leads"]').click(function () {
            if (this.checked) {
                $('div#imap_search_for_leads').show();
            } else {
                $('div#imap_search_for_leads').hide();
            }
        });
        $('input[id="for_tickets"]').click(function () {
            if (this.checked) {
                $('div#imap_search_for_tickets').show();
            } else {
                $('div#imap_search_for_tickets').hide();
            }
        });
        $('#protocol').change(function () {
            if ($('#protocol').val() == 'smtp') {
                $('#smtp_config').show();
            } else {
                $('#smtp_config').hide();
            }
        });
        $('#new_departments').change(function () {
            if ($('#new_departments').val() != '') {
                $('.new_departments').hide();
                $(".new_departments").attr('disabled', 'disabled');
            } else {
                $('.new_departments').show();
                $(".new_departments").removeAttr('disabled');
            }
        });
        $('#search_type').change(function () {
            if ($('#search_type').val() == 'employee') {
                $('.by_employee').show().attr('required', true);
                $('.by_month').hide().removeAttr('required');
                $('.by_period').hide().removeAttr('required');
                $('.by_activities').hide().removeAttr('required');
            } else if ($('#search_type').val() == 'month') {
                $('.by_employee').hide().removeAttr('required');
                $('.by_month').show().attr('required', true);
                $('.by_period').hide().removeAttr('required');
                $('.by_activities').hide().removeAttr('required');
            } else if ($('#search_type').val() == 'period') {
                $('.by_employee').hide().removeAttr('required');
                $('.by_month').hide().removeAttr('required');
                $('.by_period').show().attr('required', true);
                $('.by_activities').hide().removeAttr('required');
            } else {
                $('.by_employee').hide().removeAttr('required');
                $('.by_month').hide().removeAttr('required');
                $('.by_period').hide().removeAttr('required');
                $('.by_activities').hide().removeAttr('required');
                $('.all_payment_history').hide();
            }
        });
        $('#goal_type_id').change(function () {
            if ($('#goal_type_id').val() == '2' || $('#goal_type_id').val() == '4') {
                $('#account').show();
                document.getElementById("account_id").disabled = false;
            } else {
                $('#account').hide();
                document.getElementById("account_id").disabled = true;
            }
        });
        $('input.select_one').on('change', function () {
            $('input.select_one').not(this).prop('checked', false);
        });
        $(".select_box").select2({});
        $(".select_2_to").select2({
            tags: true,
            allowClear: true,
            tokenSeparators: [',', ' ']
        });
        $(".select_multi").select2({
            allowClear: true,
            placeholder: 'Select Multiple',
            tokenSeparators: [',', ' ']
        });
        $('input[id="same_as_company"]').click(function () {
            if (this.checked) {
                $("input[name='billing_phone']").val($("input[name='phone']").val());
                $("input[name='billing_email']").val($("input[name='email']").val());
                $("textarea[name='billing_address']").val($("textarea[name='address']").val());
                $("input[name='billing_city']").val($("input[name='city']").val());
                $("input[name='billing_state']").val($("input[name='state']").val());
                $("input[name='billing_country']").val($("input[name='country']").val());
            }
        });
        $('input[id="same_as_billing"]').click(function () {
            if (this.checked) {
                $("input[name='shipping_phone']").val($("input[name='billing_phone']").val());
                $("input[name='shipping_email']").val($("input[name='billing_email']").val());
                $("textarea[name='shipping_address']").val($("textarea[name='billing_address']").val());
                $("input[name='shipping_city']").val($("input[name='billing_city']").val());
                $("input[name='shipping_state']").val($("input[name='billing_state']").val());
                $("input[name='shipping_country']").val($("input[name='billing_country']").val());
            }
        });

        $('input[id="same_time"]').click(function () {
            if (this.checked) {
                $('.same_time').show();
                $('.different_time').hide();
                $(".different_time_input").attr('disabled', 'disabled');
                $(".disabled").attr('disabled', 'disabled');
                $(".same_time").removeAttr('disabled');
            } else {
                $('.same_time').hide();
                $(".same_time").attr('disabled', 'disabled');
            }
        });

        $('input[id="different_time"]').click(function () {
            if (this.checked) {
                $('.same_time').hide();
                $('.different_time').show();
                $(".different_time_input").removeAttr('disabled');
                $(".same_time").attr('disabled', 'disabled');
            } else {
                $('.same_time').hide();
                $(".different_time_input").attr('disabled', 'disabled');
                $(".same_time").attr('disabled', 'disabled');
            }
        });
        $(".disabled").attr('disabled', 'disabled');
        $(".different_time_input").click(function () {
            var id = $(this).val();
            if (this.checked) {
                $('#different_time_' + id).show();
                $(".different_time_hours_" + id).removeAttr('disabled');
                $(".different_time_hours_" + id).removeClass('disabled');

            } else {
                $('#different_time_' + id).hide();
                $(".different_time_hours_" + id).attr('disabled', 'disabled');

            }
        });
        $('input[id="fixed_rate"]').click(function () {
            if (this.checked) {
                $('div.fixed_price').show();
                $('div.hourly_rate').hide();
                $("div.hourly_rate").removeClass('hidden');
            } else {
                $('div.fixed_price').hide();
                $('div.hourly_rate').show();
                $("div.fixed_price").removeClass('hidden');
                $("div.hourly_rate").removeClass('hidden');
            }
        });

    });

})
(window, document, window.jQuery);


// SPARKLINE
// -----------------------------------

(function (window, document, $, undefined) {

    $(function () {

        $('[data-sparkline]').each(initSparkLine);

        function initSparkLine() {
            var $element = $(this),
                options = $element.data(),
                values = options.values && options.values.split(',');

            options.type = options.type || 'bar'; // default chart is bar
            options.disableHiddenCheck = true;

            $element.sparkline(values, options);

            if (options.resize) {
                $(window).resize(function () {
                    $element.sparkline(values, options);
                });
            }
        }
    });

    //common ajax request
    $('body').on('click', '[data-act=ajax-request]', function () {
        var delete_confirm = confirm(ldelete_confirm);
        if (delete_confirm == true) {
            var data = {},
                $selector = $(this),
                url = $selector.attr('data-action-url'),
                removeOnSuccess = $selector.attr('data-remove-on-success'),
                removeOnClick = $selector.attr('data-remove-on-click'),
                fadeOutOnSuccess = $selector.attr('data-fade-out-on-success'),
                fadeOutOnClick = $selector.attr('data-fade-out-on-click'),
                inlineLoader = $selector.attr('data-inline-loader'),
                reloadOnSuccess = $selector.attr('data-reload-on-success');

            var $target = "";
            if ($selector.attr('data-real-target')) {
                $target = $($selector.attr('data-real-target'));
            } else if ($selector.attr('data-closest-target')) {
                $target = $selector.closest($selector.attr('data-closest-target'));
            }

            if (!url) {
                console.log('Ajax Request: Set data-action-url!');
                return false;
            }

            //remove the target element
            if (removeOnClick && $(removeOnClick).length) {
                $(removeOnClick).remove();
            }

            //remove the target element with fade out effect
            if (fadeOutOnClick && $(fadeOutOnClick).length) {
                $(fadeOutOnClick).fadeOut(function () {
                    $(this).remove();
                });
            }

            $selector.each(function () {
                $.each(this.attributes, function () {
                    if (this.specified && this.name.match("^data-post-")) {
                        var dataName = this.name.replace("data-post-", "");
                        data[dataName] = this.value;
                    }
                });
            });
            ajaxRequestXhr = $.ajax({
                url: url,
                data: data,
                cache: false,
                type: 'POST',
                success: function (response) {
                    var result = JSON.parse(response);
                    toastr[result.status](result.message);
                    if (reloadOnSuccess) {
                        location.reload();
                    }
                    if (result.status == 'success') {
                        //remove the target element
                        if (removeOnSuccess && $(removeOnSuccess).length) {
                            $(removeOnSuccess).remove();
                        }

                        //remove the target element with fade out effect
                        if (fadeOutOnSuccess && $(fadeOutOnSuccess).length) {
                            $(fadeOutOnSuccess).fadeOut(function () {
                                $(this).remove();
                            });
                        }
                        if ($target.length) {
                            $target.html(response);
                        }
                    }
                },
                statusCode: {
                    404: function () {
                        toastr['error']('404: Page not found.');
                    }
                },
                error: function () {
                    toastr['error']('500: Internal Server Error.');
                }
            });
        }
    });

})(window, document, window.jQuery);

function do_filter_active(value, parent_selector) {
    if (value != '' && typeof (value) != 'undefined') {
        $('[data-cview="all"]').parents('li').removeClass('active');
        var selector = $('[data-cview="' + value + '"]');
        if (typeof (parent_selector) != 'undefined') {
            selector = $(parent_selector + ' [data-cview="' + value + '"]');
        }
        if (!selector.parents('li').not('.dropdown-submenu').hasClass('active')) {
            selector.parents('li').addClass('active');
        } else {
            selector.parents('li').not('.dropdown-submenu').removeClass('active');
            // Remove active class from the parent dropdown if nothing selected in the child dropdown
            var parents_sub = selector.parents('li.dropdown-submenu');
            if (parents_sub.length > 0) {
                if (parents_sub.find('li.active').length == 0) {
                    parents_sub.removeClass('active');
                }
            }
            value = "";
        }
        return value;
    } else {
        $('._filters input').val('');
        $('._filter_data li.active').removeClass('active');
        $('[data-cview="all"]').parents('li').addClass('active');
        return "";
    }
}

$(function () {
    $('#parent_present').on('change', function () {
        $('.child_present').prop('checked', $(this).prop('checked'));
    });
    $('.child_present').on('change', function () {
        $('.child_present').prop($('.child_present:checked').length ? true : false);
    });
    $('#parent_absent').on('change', function () {
        $('.child_absent').prop('checked', $(this).prop('checked'));
    });
    $('.child_absent').on('change', function () {
        $('.child_absent').prop($('.child_absent:checked').length ? true : false);
    });
});
$(document).ready(function () {
    $("#add_more_comments_attachement").click(function () {
        var new_comments_attachement = $('<div class="form-group" style="margin-bottom: 0px">\n\
        <div class="col-sm-8">\n\
        <div class="fileinput fileinput-new" data-provides="fileinput">\n\
<span class="btn btn-default btn-file"><span class="fileinput-new" >Select file</span><span class="fileinput-exists" >Change</span><input type="file" name="comments_attachment[]" ></span> <span class="fileinput-filename"></span><a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none;">&times;</a></div></div>\n\<div class="col-sm-4">\n\<strong>\n\
<a href="javascript:void(0);" class="c_remCF"><i class="fa fa-times"></i>&nbsp;Remove</a></strong></div>');
        $("#new_comments_attachement").append(new_comments_attachement);
    });

    $("#new_comments_attachement").on('click', '.c_remCF', function () {
        $(this).parent().parent().parent().remove();
    });
});

var doc_title = document.title;

$(function () {

});

function read_inline(id) {
    $.get(base_url + 'admin/global_controller/read_inline/' + id, function () {
        var notification = $('body').find('.notification-li[data-notification-id="' + id + '"]');
        notification.find('.n-link,.n-box-all').removeClass('unread');
        notification.find('.mark-as-read-inline').tooltip('destroy').remove();
    });
}

function mark_all_as_read() {
    $.get(base_url + 'admin/global_controller/mark_all_as_read/', function () {
        var notification = $('body').find('.notification-li');
        notification.find('.n-link,.n-box-all').removeClass('unread');
        notification.find('.mark-as-read-inline').tooltip('destroy').remove();
    });
}

//custom app form controller
(function ($) {
    $.fn.appForm = function (options) {
        var defaults = {
            ajaxSubmit: true,
            isModal: true,
            dataType: "json",
            onModalClose: function () {
            },
            onSuccess: function () {
            },
            onError: function () {
                return true;
            },
            onSubmit: function () {
            },
            onAjaxSuccess: function () {
            },
            beforeAjaxSubmit: function (data, self, options) {
            }
        };

        var settings = $.extend({}, defaults, options);
        this.each(function () {
            if (settings.ajaxSubmit) {
                validateForm($(this), function (form) {
                    settings.onSubmit();
                    if (settings.isModal) {
                        maskModal($("#ajaxModalContent").find(".modal-body"));
                    }
                    $(form).ajaxSubmit({
                        dataType: settings.dataType,
                        beforeSubmit: function (data, self, options) {
                            settings.beforeAjaxSubmit(data, self, options);
                        },
                        success: function (result) {
                            settings.onAjaxSuccess(result);
                            if (result.status == 'success') {
                                settings.onSuccess(result);
                                if (settings.isModal) {
                                    closeAjaxModal(true);
                                }
                            } else {
                                if (settings.onError(result)) {
                                    if (settings.isModal) {
                                        unmaskModal();
                                        if (result.message) {
                                            toastr[result.status](result.message);
                                        }
                                    } else if (result.message) {
                                        toastr[result.status](result.message);
                                    }
                                }
                            }
                        }
                    });
                });
            } else {
                validateForm($(this));
            }
        });

        /*
         * @form : the form we want to validate;
         * @customSubmit : execute custom js function insted of form submission.
         * don't pass the 2nd parameter for regular form submission
         */
        function validateForm(form, customSubmit) {
            //add custom method
            $.validator.addMethod("greaterThanOrEqual",
                function (value, element, params) {
                    var paramsVal = params;
                    if (params && (params.indexOf("#") === 0 || params.indexOf(".") === 0)) {
                        paramsVal = $(params).val();
                    }
                    if (!/Invalid|NaN/.test(new Date(value))) {
                        return new Date(value) >= new Date(paramsVal);
                    }
                    return isNaN(value) && isNaN(paramsVal)
                        || (Number(value) >= Number(paramsVal));
                }, 'Must be greater than {0}.');
            $(form).validate({
                submitHandler: function (form) {
                    if (customSubmit) {
                        customSubmit(form);
                    } else {
                        return true;
                    }
                },
                highlight: function (element) {
                    $(element).closest('.form-group').addClass('has-error');
                },
                unhighlight: function (element) {
                    $(element).closest('.form-group').removeClass('has-error');
                },
                errorElement: 'span',
                errorClass: 'help-block',
                ignore: ":hidden:not(.validate-hidden)",
                errorPlacement: function (error, element) {
                    if (element.parent('.input-group').length) {
                        error.insertAfter(element.parent());
                    } else {
                        error.insertAfter(element);
                    }
                }
            });
            //handeling the hidden field validation like select2
            $(".validate-hidden").click(function () {
                $(this).closest('.form-group').removeClass('has-error').find(".help-block").hide();
            });
        }

        //show loadig mask on modal before form submission;
        function maskModal($maskTarget) {
            var padding = $maskTarget.height() - 80;
            if (padding > 0) {
                padding = Math.floor(padding / 2);
            }
            $maskTarget.append("<div class='modal-mask'><div class='circle-loader'></div></div>");
            //check scrollbar
            var height = $maskTarget.outerHeight();
            $('.modal-mask').css({
                "width": $maskTarget.width() + 30 + "px",
                "height": height + "px",
                "padding-top": padding + "px"
            });
            $maskTarget.closest('.modal-dialog').find('[type="submit"]').attr('disabled', 'disabled');
        }

        //remove loadig mask from modal
        function unmaskModal() {
            var $maskTarget = $(".modal-body");
            $maskTarget.closest('.modal-dialog').find('[type="submit"]').removeAttr('disabled');
            $(".modal-mask").remove();
        }

        //colse ajax modal and show success check mark
        function closeAjaxModal(success) {
            if (success) {
                $(".modal-mask").html("<div class='circle-done'><i class='fa fa-check'></i></div>");
                setTimeout(function () {
                    $(".modal-mask").find('.circle-done').addClass('ok');
                }, 30);
            }
            setTimeout(function () {
                $(".modal-mask").remove();
                $("#ajaxModal").modal('toggle');
                settings.onModalClose();
            }, 1000);
        }
    };
})(jQuery);
(function ($) {
    $.fn.replaceClass = function (pFromClass, pToClass) {
        return this.removeClass(pFromClass).addClass(pToClass);
    };
}(jQuery));

initScrollbar = function (selector, options) {
    if (!options) {
        options = {};
    }

    var defaults = {
            theme: "minimal-dark",
            autoExpandScrollbar: true,
            keyboard: {
                enable: true,
                scrollType: "stepless",
                scrollAmount: 40
            },
            mouseWheelPixels: 300,
            scrollInertia: 60,
            mouseWheel: {scrollAmount: 188, normalizeDelta: true}
        },
        settings = $.extend({}, defaults, options);

    if ($.fn.mCustomScrollbar) {
        $(selector).mCustomScrollbar(settings);
    }

};

function goBack() {
    window.history.back();
}

$('#s-menu').keyup(function () {
    var that = this, $allListElements = $('ul.s-menu > li');
    var $matchingListElements = $allListElements.filter(function (i, li) {
        var listItemText = $(li).text().toUpperCase(), searchText = that.value.toUpperCase();
        return ~listItemText.indexOf(searchText);
    });
    $allListElements.hide();
    $matchingListElements.show();
});

// Slide toggle any selector passed
function slideToggle(selector, callback) {
    var $element = $(selector);
    if ($element.hasClass('hide')) {
        $element.removeClass('hide', 'slow');
    }
    if ($element.length) {
        $element.slideToggle();
    }
    // Set all progress bar to 0 percent
    var progress_bars = $('.progress-bar').not('.not-dynamic');
    if (progress_bars.length > 0) {
        progress_bars.each(function () {
            $(this).css('width', 0 + '%');
            $(this).text(0 + '%');
        });
        // Init the progress bars again
        init_progress_bars();
    }
    // Possible callback after slide toggle
    if (typeof (callback) == 'function') {
        callback();
    }
}

$('body').on('change', '#unlimited_cycles', function () {
    $(this).parents('.recurring-cycles').find('#cycles').prop('disabled', $(this).prop('checked'));
});

// For expenses and recurring tasks
$("body").on('change', '[name="repeat_every"], [name="recurring"]', function () {
    var val = $(this).val();
    val == 'custom' ? $('.recurring_custom').removeClass('hide') : $('.recurring_custom').addClass('hide');
    if (val !== '' && val != 0) {
        $("body").find('#cycles_wrapper').removeClass('hide');
    } else {
        $("body").find('#cycles_wrapper').addClass('hide');
        $("body").find('#cycles_wrapper #cycles').val(0);
        $('#unlimited_cycles').prop('checked', true).change();
    }
});

$('body').on('change blur', '.apply_credit_invoices .amount-credit-field', function () {

    var $creditApply = $('#credit_apply');
    var $amountInputs = $creditApply.find('input.amount-credit-field');
    var total = 0;
    var creditsRemaining = $creditApply.attr('data-credit-remaining');
    $.each($amountInputs, function () {
        $(this).next(".validate_error").addClass('hidden');
        var amount = $(this).val();
        var invoiceDue = $(this).data('invoice-due');
        amount = parseFloat(amount);
        invoiceDue = parseFloat(invoiceDue);
        if (amount) {
            if (!isNaN(amount)) {
                if (invoiceDue < amount) {
                    $(this).next(".validate_error").removeClass('hidden');
                    $('.amount_exceed').addClass('disabled');
                } else {
                    $('.amount_exceed').removeClass('disabled');
                }
                total += amount;
            } else {
                $(this).val(0);
            }
        }
    });
    $creditApply.find('#invoice-credit-alert').remove();
    $creditApply.find('.amount-credit').html(total);
    if (creditsRemaining < total) {
        $('.invoice-table').before($('<div/>', {
            id: 'invoice-credit-alert',
            class: 'alert alert-danger text-center',
        }).html(credit_amount_bigger_then_remaining_credit));
        $creditApply.find('button.amount_exceed').prop('disabled', true);
    } else {
        $creditApply.find('.credit_remaining').html((creditsRemaining - total));
        $creditApply.find('button.amount_exceed').prop('disabled', false);
    }
});

$('body').on('change blur', '.apply-invoice-credit .amount-credit-field', function () {

    var $creditApply = $('#credit_apply');
    var $amountInputs = $creditApply.find('input.amount-credit-field');
    var total = 0;
    var invoiceBalanceDue = $creditApply.attr('data-invoice-due');

    $.each($amountInputs, function () {
        $(this).next(".validate_error").addClass('hidden');
        var amount = $(this).val();
        var creditRemaining = $(this).data('credit-remaining');
        amount = parseFloat(amount);
        creditRemaining = parseFloat(creditRemaining);
        if (amount) {
            if (!isNaN(amount)) {
                if (creditRemaining < amount) {
                    $(this).next(".validate_error").removeClass('hidden');
                    $('.amount_exceed').addClass('disabled');
                } else {
                    $('.amount_exceed').removeClass('disabled');
                }
                total += amount;
            } else {
                $(this).val(0);
            }
        }
    });

    $creditApply.find('#credit-invoice-alert').remove();
    $creditApply.find('.amount-credit').html(total);
    if (total > invoiceBalanceDue) {
        $('.credit-table').before($('<div/>', {
            id: 'credit-invoice-alert',
            class: 'alert alert-danger',
        }).html(credit_amount_bigger_then_invoice_due));
        $creditApply.find('button.amount_exceed').prop('disabled', true);
    } else {
        $creditApply.find('.invoice_due').html(invoiceBalanceDue - total);
        $creditApply.find('button.amount_exceed').prop('disabled', false);
    }
});
$('#select_all').change(function () {
    var c = this.checked;
    $(':checkbox').prop('checked', c);
});
$(document).on("click", '.custom-bulk-button', function () {
    var r = confirm(ldelete_confirm);
    if (r == false) {
        return false;
    } else {
        var ids = [];
        var data = {};
        var rows = $('.bulk_table').find('tbody tr');
        $.each(rows, function () {
            var checkbox = $($(this).find('td').eq(0)).find('input');
            if (checkbox.prop('checked') == true) {
                ids.push(checkbox.val());
            }
        });
        data.ids = ids;
        $(event).addClass('disabled');
        if (bulk_url) {
            $.post(bulk_url, data).done(function (result) {
                var results = JSON.parse(result);
                for (var i = 0; i < results.length; i++) {
                    toastr[results[i].status](results[i].message);
                }
                reload_table();
            });
        }
    }
});

(function (window, document, $, undefined) {

    $(function () {

        var navSearch = new navbarSearchInput();

        // Open search input
        var $searchOpen = $('[data-search-open]');

        $searchOpen
            .on('click', function (e) {
                e.stopPropagation();
            })
            .on('click', navSearch.toggle);

        // Close search input
        var $searchDismiss = $('[data-search-dismiss]');
        var inputSelector = '.navbar-form input[type="text"]';

        $(inputSelector)
            .on('click', function (e) {
                e.stopPropagation();
            })
            .on('keyup', function (e) {
                if (e.keyCode == 27) // ESC
                    navSearch.dismiss();
            });

        // click anywhere closes the search
        // $(document).on('click', navSearch.dismiss);
        // dismissable options
        $searchDismiss
            .on('click', function (e) {
                e.stopPropagation();
            })
            .on('click', navSearch.dismiss);

    });

    var navbarSearchInput = function () {
        var navbarFormSelector = '.navbar-form';
        return {
            toggle: function () {

                var navbarForm = $(navbarFormSelector);

                navbarForm.toggleClass('open');

                var isOpen = navbarForm.hasClass('open');

                navbarForm.find('input')[isOpen ? 'focus' : 'blur']();

            },

            dismiss: function () {
                $(navbarFormSelector)
                    .removeClass('open')      // Close control
                    .find('input[type="text"]').blur() // remove focus
                    .val('')                    // Empty input
                ;
            }
        };
    }

})(window, document, window.jQuery);

