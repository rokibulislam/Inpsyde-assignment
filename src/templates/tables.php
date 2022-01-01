<?php
/**
 * Inpsyde users template
 *
 * @package Inpsyde\tables
 */

get_header(); ?>

<table class="users_list">
	<thead>
		<tr>
			<td> <?php esc_html_e( 'Id', 'inpsyde' ); ?> </td>
			<td> <?php esc_html_e( 'Name', 'inpsyde' ); ?> </td>
			<td> <?php esc_html_e( 'Username', 'inpsyde' ); ?> </td>
			<td> <?php esc_html_e( 'Email', 'inpsyde' ); ?> </td>
			<td> <?php esc_html_e( 'Website', 'inpsyde' ); ?> </td>
			<td> <?php esc_html_e( 'Phone', 'inpsyde' ); ?> </td>
			<td> <?php esc_html_e( 'Company', 'inpsyde' ); ?> </td>
		</tr>
	</thead>

	<tbody>

	<?php
	foreach ( $users->get_users() as $user ) {

		$uid = $user->get_id();
		$name = $user->get_name();
		$username = $user->get_username();
		$email = $user->get_email();
		$website = $user->get_website();
		$phone = $user->get_phone();
		$company_name = $user->get_company()->get_name();
		?>
	 

		<tr data-user-id="<?php echo esc_attr( $uid ); ?>">
			<td>	
				<a class="lovely-user-id" href="" data-user-id="<?php echo esc_attr( $uid ); ?>"> 
					<?php printf( wp_kses_post( $uid ) ); ?>
				</a> 
			</td>
			<td> <a class="lovely-user-id" href="" data-user-id="<?php echo esc_attr( $uid ); ?>"><?php printf( wp_kses_post( $name ) ); ?></td>
			<td> <a class="lovely-user-id" href="" data-user-id="<?php echo esc_attr( $uid ); ?>"> <?php printf( wp_kses_post( $username ) ); ?> </a> </td>
			<td> <a class="lovely-user-id" href="" data-user-id="<?php echo esc_attr( $uid ); ?>"> <?php printf( wp_kses_post( $email ) ); ?> </a> </td>
			<td> <?php printf( wp_kses_post( $website ) ); ?> </td>
			<td> <?php printf( wp_kses_post( $phone ) ); ?> </td>
			<td> <?php printf( wp_kses_post( $company_name ) ); ?> </td>
		</tr>

	<?php } ?>

	</tbody>
</table>

<div id="user_details">
	

</div>

<?php get_footer(); ?>
