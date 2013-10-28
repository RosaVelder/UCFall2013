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
                phone: {
                    title: 'Phone',
                    width: '15%'
                }
            }
        });
</script>
