!function(r,e,o){var t=function(r){type=r.closest(".xpro-user-role-wrapper").attr("data-type"),rules=r.find(".xpro-user-role-condition"),show_close=!1,rules.length>1&&(show_close=!0),rules.each(function(){show_close?jQuery(this).find(".user_role-condition-delete").removeClass("xpro-hidden"):jQuery(this).find(".user_role-condition-delete").addClass("xpro-hidden")})};r(document).ready(function(r){jQuery(".xpro-user-role-selector-wrapper").each(function(){t(jQuery(this))}),jQuery(".xpro-user-role-selector-wrapper").on("click",".user_role-add-rule-wrap a",function(r){r.preventDefault(),r.stopPropagation();var e=jQuery(this),o=parseInt(e.attr("data-rule-id"))+1,a=e.closest(".xpro-user-role-selector-wrapper").find(".user_role-builder-wrap"),l=wp.template("xpro-user-role-condition"),n=e.closest(".xpro-user-role-wrapper");a.append(l({id:o})),e.attr("data-rule-id",o),t(n)}),jQuery(".xpro-user-role-selector-wrapper").on("click",".user_role-condition-delete",function(r){var e=jQuery(this),o=e.closest(".xpro-user-role-condition"),a=e.closest(".xpro-user-role-wrapper");cnt=0,data_type=a.attr("data-type"),optionVal=e.siblings(".user_role-condition-wrap").children(".user_role-condition").val(),o.remove(),a.find(".xpro-user-role-condition").each(function(r){var e=jQuery(this),o=e.attr("data-rule"),t=e.find(".user_role-condition"),a=t.attr("name");e.attr("data-rule",r),t.attr("name",a.replace("["+o+"]","["+r+"]")),e.removeClass("xpro-user-role-"+o).addClass("xpro-user-role-"+r),cnt=r}),a.find(".user_role-add-rule-wrap a").attr("data-rule-id",cnt),t(a)})})}(jQuery,window);