const gridConfig = [{
        name: "id",
        type: "number",
        visible: false,
        editing: true,
    },
    {
        name: "name",
        title: "Name",
        type: "text",
        width: 80,
        validate: {
            validator: "required",
            message: "Name required"
        }
    },
    {
        name: "lastName",
        title: "Lastname",
        type: "text",
        validate: {
            validator: "required",
            message: "Lastname required"
        }
    },
    {
        name: "email",
        title: "Email",
        type: "text",
        width: 200,
        validate: {
            validator: "required",
            message: "Email required"
        }
    },
    {
        name: "gender",
        title: "Gender",
        type: "select",
        items: [
            {name: '', id: ''},
            {name: "male", id: "male"},
            {name: "female", id: "female"}
        ],
        selectedIndex: -1,
        valueField: "id",
        textField: "name",
        validate: {
            validator: "required",
            message: "Gender required"
        }
    },
    {
        name: "city",
        title: "City",
        type: "text",
        validate: {
            validator: "required",
            message: "City required"
        }
    },
    {
        name: "streetAddress",
        title: "Street Address",
        type: "text",
        validate: {
            validator: "required",
            message: "Street Adress required"
        }
    },
    {
        name: "state",
        title: "State",
        type: "text",
        validate: {
            validator: "required",
            message: "State required"
        }
    },
    {
        name: "age",
        title: "Age",
        type: "number",
        width: 100,
        validate: {
            validator: "range",
            param: [18, 80],
            message: "Age should be between 18 and 80"
        }
    },
    {
        name: "postalCode",
        title: "Postal Code",
        type: "number",
        width: 75,
        validate: {
            validator: "range",
            param: [1,99999],
            message: "Postal code should be between 00000 and 99999"
        }
    },
    {
        type: "number",
        title: "Phone Number",
        name: "phoneNumber",
        validate: {
            validator: "required",
            message: "Phone number required"
        }
    },
    {
        type: "text",
        name: "avatar",
        visible: false,
        editing: true,
    },
    {
        type: "control",
        modeSwitchButton: false,
        editButton: true,
        rowClick: true,
        rowDoubleClick: true,

    },
]
export default gridConfig