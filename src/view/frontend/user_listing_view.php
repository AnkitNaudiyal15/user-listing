<table id="example" class="table table-striped table-bordered ank-table" style="width:100%">
    <thead>
        <tr>
            <th>Login ID</th>
            <th>Display Name</th>
            <th>Email</th>
            <th>Registration Date</th>
        </tr>
    </thead>
    </tbody>
    
        <?php
                foreach($users as $user){
                        echo "<tr>";
                        echo "<td>$user->user_login</td>";
                        echo "<td>$user->user_login</td>";
                        echo "<td>$user->user_login</td>";
                        echo "<td>$user->user_login</td>";
                        echo "</tr>";
                }
?>
    </tr>
    </tbody>
</table>