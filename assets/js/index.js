import gridConfig from "./gridConfig.js"

const mainPath = previousFolder(location.pathname)
const employeeControllerUrl = `${mainPath}/library/employeeController.php`
const employeeUrl = `${mainPath}/employee.php`
const sessionHelperUrl = `${mainPath}/library/sessionHelper.php`

function previousFolder(path) {
    return path.substring(0, path.lastIndexOf('/'))
}

function showMessage(messageText, type) {
    $('#alertMessage').addClass(type).removeClass('hide').text(messageText)
}

function hideMessage(type) {
    setTimeout(function() {
        $('#alertMessage').removeClass(type).addClass('hide')
    }, 2000)
}

async function callGrid() {
    $("#jsGrid").jsGrid({
        width: "100%",
        height: "400px",

        inserting: true,
        editing: true,
        sorting: true,
        autoload: true,
        filtering: false,
        paging: true,
        pageSize: 10,
        pageButtonCount: 5,
        confirmDeleting: true,
        deleteConfirm: 'Do you really want to delete employee?',

        fields: gridConfig,

        controller: {
            loadData: function(){
                const d = $.Deferred();
                $.ajax({
                    type:'POST',
                    url: employeeControllerUrl,
                    dataType: "json",
                    data: ({
                        action: 'getAllEmployees',
                        user: ''
                    }),
                }). catch(error => console.error(error))
                .done(function (data){
                    d.resolve(Object.values(data))
                })
                return d.promise()
            }
        },

        rowClick: function (args) {
            window.location.assign(`${employeeUrl}?id=${args.item.id}`)
        },

        onItemInserting: async function (args) {
            args.item.id = ''
            args.item.avatar=''
            $.ajax({
                type: 'POST',
                url: employeeControllerUrl,
                dataType: "json",
                data: ({
                    action:'add',
                    user:args.item
                }),
            })
        },

        onItemInserted: function () {
            showMessage('Employee Inserted', 'alert-success')
            hideMessage('alert-success')
        },

        onItemUpdating: function (args) {
            $.ajax({
                type: 'POST',
                url: employeeControllerUrl,
                dataType: "json",
                data: ({
                    action: 'update',
                    user: args.item
                }),
            })
         },

        onItemUpdated: function () {
            showMessage('Employee Updated', 'alert-success')
            hideMessage('alert-success')
        },

        onItemDeleting: async function(args){
            $.ajax({
                type: 'POST',
                url: employeeControllerUrl,
                dataType: "json",
                data: ({
                    action: 'delete',
                    user: args.item
                }),
            })
        },

        onItemDeleted: function () {
            showMessage('Employee Deleted', 'alert-success')
            hideMessage('alert-success')
        }
    });
}

callGrid()

setInterval(() => {
    $.ajax({
        type: 'POST',
        url: `${sessionHelperUrl}`,
        success: function (data) {
            if (data === "logout"){
                location.assign("./../index.php")
            }
        }
    })
}, 10000)