<script type="text/javascript">
	 $('#PersonTableContainer').jtable({
            title: 'Table of people',
            actions: {
                listAction: '../scripts/volunteerActions.php?action=list',
                createAction: '../scripts/volunteerActions.php?action=create',
                updateAction: '../scripts/volunteerActions.php?action=update',
                deleteAction: '../scripts/volunteerActions.php?action=delete'
            },
            fields: {
                volunteerID: {
                    key: true,
                    list: false
                },
                firstName: {
                    title: 'First Name',
                    width: '15%'
                },
                lastName: {
                    title: 'Last Name',
                    width: '15%'
                },
                ucID: {
                    title: 'UC ID',
                    width: '10%'
                },
                password: {
                    title: 'Password',
                    list: false
                },
                admin: {
                    title: 'admin',
                    list: false
                },
                email: {
                    title: 'E-mail',
                    width: '15%'
                },
                Phones: {
                    title: '',
                    width: '5%',
                    sorting: false,
                    edit: false,
                    create: false,
                    display: function (studentData) {
                        //Create an image that will be used to open child table
                        var $img = $('<img src="jtable/phone_metro.png" title="Edit phone numbers" />');
                        //Open child table when user clicks the image
                        $img.click(function () {
                            $('#StudentTableContainer').jtable('openChildTable',
                                    $img.closest('tr'),
                                    {
                                        title: studentData.record.Name + ' - Phone numbers',
                                        actions: {
                                            listAction: '/Demo/PhoneList?StudentId=' + studentData.record.StudentId,
                                            deleteAction: '/Demo/DeletePhone',
                                            updateAction: '/Demo/UpdatePhone',
                                            createAction: '/Demo/CreatePhone'
                                        },
                                        fields: {
                                            volunteerId: {
												key: true,
												create: false,
												edit: false,
												list: false,
                                                type: 'hidden',
                                                //defaultValue: studentData.record.StudentId
                                            },
                                            phone: {
                                                title: 'Phone Number',
                                                width: '30%'
                                            }
                                        }
                                    }, function (data) { //opened handler
                                        data.childTable.jtable('load');
                                    });
                        });
                        //Return image to show on the person row
                        return $img;
                    }
                },
            }
        });
</script>
