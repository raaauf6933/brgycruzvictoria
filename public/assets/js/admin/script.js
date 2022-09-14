const token = $('meta[name="csrf-token"]').attr("content");
const baseUrl = window.location.origin;
let pond;

$(() => {
    // Profile
    if (window.location.href === route("profile.index")) {
        $("#profile_nav").addClass("active");
    }

    // Activity Logs
    if (window.location.href === route("admin.activity_logs.index")) {
        const activitylog_data = [
            { data: "id" },
            { data: "description" },
            {
                data: "created_at",
                render(data) {
                    return formatDate(data, "datetime");
                },
            },
            { data: "properties.ip" },
        ];
        c_index(
            $(".activitylog_dt"),
            route("admin.activity_logs.index"),
            activitylog_data
        );

        $("#activity_logs_nav").addClass("active");
    }

    //Purok;
    if (window.location.href === route("admin.puroks.index")) {
        const column_data = [
            { data: "name" },
            { data: "actions", orderable: false, searchable: false },
        ];
        c_index($(".purok_dt"), route("admin.puroks.index"), column_data, {
            title: "<h3 class='text-center'>List of Purok </h3>",
        });
        $("#resident_management_nav").addClass("active");
        $("#purok").addClass("font-weight-bold text-success");
    }

    //Resident;
    if (window.location.href === route("admin.residents.index")) {
        const column_data = [
            { data: "name" },
            { data: "age" },
            {
                data: "gender",
                render(data) {
                    return `<span class='text-capitalize'>${data}</span>`;
                },
            },
            { data: "purok" },
            {
                data: "is_voter",
                render(data) {
                    return isVoter(data);
                },
            },
            {
                data: "created_at",
                render(data) {
                    return formatDate(data.date, "full");
                },
            },
            { data: "actions", orderable: false, searchable: false },
        ];
        c_index(
            $(".resident_dt"),
            route("admin.residents.index"),
            column_data,
            {
                title: "<h3 class='text-center'>List of Resident </h3>",
            }
        );

        $("#resident_management_nav").addClass("active");
        $("#resident").addClass("font-weight-bold text-success");
    }

    //User;
    if (window.location.href === route("admin.users.index")) {
        const column_data = [
            { data: "id" },
            { data: "name" },
            {
                data: "role",
                render(data) {
                    return `<span class='badge badge-success'>${data}</span>`;
                },
            },
            {
                data: "is_activated",
                render(data) {
                    return isActivated(data);
                },
            },
            {
                data: "created_at",
                render(data) {
                    return formatDate(data.date, "full");
                },
            },
            { data: "actions", orderable: false, searchable: false },
        ];
        c_index($(".user_dt"), route("admin.users.index"), column_data, {
            title: "<h3 class='text-center'>List of User </h3>",
        });

        $("#auth_management_nav").addClass("active");
    }

    //Service;
    if (window.location.href === route("admin.services.index")) {
        const column_data = [
            { data: "name" },
            { data: "description" },
            { data: "fee" },
            { data: "actions", orderable: false, searchable: false },
        ];
        c_index($(".service_dt"), route("admin.services.index"), column_data, {
            title: "<h3 class='text-center'>List of Services </h3>",
        });

        $("#services_management_nav").addClass("active");
        $("#services").addClass("font-weight-bold text-success");
    }

    //Blotter;
    if (window.location.href === route("admin.blotters.index")) {
        const column_data = [
            { data: "id" },
            { data: "complainant" },
            { data: "respondent" },
            { data: "incharge" },
            {
                data: "is_solved",
                render(data) {
                    return isSolved(data);
                },
            },
            {
                data: "created_at",
                render(data) {
                    return formatDate(data, "datetime");
                },
            },
            { data: "actions", orderable: false, searchable: false },
        ];
        c_index($(".blotter_dt"), route("admin.blotters.index"), column_data, {
            title: "<h3 class='text-center'>List of Blotter Reports </h3>",
        });
    }

    //Position;
    if (window.location.href === route("admin.positions.index")) {
        const column_data = [
            { data: "id" },
            { data: "name" },
            { data: "actions", orderable: false, searchable: false },
        ];
        c_index(
            $(".position_dt"),
            route("admin.positions.index"),
            column_data,
            {
                title: "<h3 class='text-center'>List of Position </h3>",
            }
        );

        $("#official_management_nav").addClass("active");
        $("#positions").addClass("font-weight-bold text-success");
    }

    //Official;
    if (window.location.href === route("admin.officials.index")) {
        const column_data = [
            { data: "id" },
            { data: "name" },
            {
                data: "position",
                render(data) {
                    return `${data.name}`;
                },
            },
            {
                data: "is_active",
                render(data) {
                    return isActive(data);
                },
            },
            { data: "actions", orderable: false, searchable: false },
        ];
        c_index(
            $(".official_dt"),
            route("admin.officials.index"),
            column_data,
            {
                title: "<h3 class='text-center'>List of Barangay Official </h3>",
            }
        );
        $("#official_management_nav").addClass("active");
        $("#officials").addClass("font-weight-bold text-success");
    }

    // Request
    if (window.location.href === route("admin.requests.index")) {
        const column_data = [
            { data: "id" },
            {
                data: "resident",
            },
            {
                data: "service",
            },
            { data: "purpose" },
            {
                data: "status",
                render(data) {
                    return handleRequestStatus(data);
                },
            },
            { data: "remark" },
            {
                data: "created_at",
                render(data) {
                    return formatDate(data.date, "full");
                },
            },
            { data: "actions", orderable: false, searchable: false },
        ];
        c_index($(".request_dt"), route("admin.requests.index"), column_data);
        $("#services_management_nav").addClass("active");
        $("#requests").addClass("font-weight-bold text-success");
    }

    // Role
    // if (window.location.href === route("admin.role.index")) {
    //     const role_data = [
    //         {
    //             data: "name",
    //             render(data) {
    //                 return `<span class='text-capitalize badge bg-info p-2'>${data}</span>`;
    //             },
    //         },
    //     ];
    //     c_index($(".role_dt"), route("admin.role.index"), role_data);
    // }

    //   //User;
    //   if (window.location.href === route("admin.user.index")) {
    //     const user_data = [
    //         { data: "id" },
    //         { data: "name" },
    //         {
    //             data: "role.name",
    //             render(data) {
    //                 return `<span class='badge bg-primary text-white'>${data}</span>`;
    //             },
    //         },
    //         {
    //             data: "is_activated",
    //             render(data) {
    //                 return isActivated(data);
    //             },
    //         },
    //         {
    //             data: "created_at",
    //             render(data) {
    //                 return formatDate(data, "full");
    //             },
    //         },
    //         { data: "actions", orderable: false, searchable: false },
    //     ];
    //     c_index($(".user_dt"), route("admin.user.index"), user_data, {
    //         title: "<h3 class='text-center'>List of User </h3>",
    //     });

    //     $("#manage_user_nav").addClass("active");
    // }
});

//=========================================================
// Custom Functions()
function filterResident(status) {
    if (status.value) {
        const column_data = [
            { data: "name" },
            { data: "age" },
            {
                data: "gender",
                render(data) {
                    return `<span class='text-capitalize'>${data}</span>`;
                },
            },
            { data: "purok" },
            {
                data: "is_voter",
                render(data) {
                    return isVoter(data);
                },
            },
            {
                data: "created_at",
                render(data) {
                    return formatDate(data.date, "full");
                },
            },
            { data: "actions", orderable: false, searchable: false },
        ];
        c_index(
            $(".resident_dt"),
            route("admin.residents.index", {
                status: status.value,
            }),
            column_data,
            {
                title: "<h3 class='text-center'>List of Resident</h3> <br>",
            },
            true
        );
    }
}
