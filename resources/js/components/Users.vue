<template>
	<div class="mt-4">

		<!-- Main Content -->
		<div class="row">

			<!-- Users list -->
			<div class="col-md-3">
				<div class="card card-outline card-info">
				
					<div class="card-header pb-0">
						<h3 class="card-title">List</h3>
						<div class="card-tools">

								<!-- User role -->
								<!-- <div class="btn-group">
									<button class="btn btn-secondary btn-sm" type="button">
										{{ role.charAt(0).toUpperCase() + role.slice(1) }}
									</button>
									<button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split" 
													data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<span class="sr-only">Select Role for list</span>
									</button>
									<div class="dropdown-menu">
										<a class="dropdown-item" :class="(role == 'user') ? 'selected-link' : '' " @click="changeRole(1)">User</a>
										<a class="dropdown-item" :class="(role == 'member') ? 'selected-link' : '' " @click="changeRole(2)">Member</a>
										<a class="dropdown-item" :class="(role == 'doctor') ? 'selected-link' : '' " @click="changeRole(3)">Doctor</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" :class="(role == 'staff') ? 'selected-link' : '' " @click="changeRole(4)">Staff</a>
										<a class="dropdown-item" :class="(role == 'admin') ? 'selected-link' : '' " @click="changeRole(5)">Admin</a>
									</div>
								</div> -->
							
								<!-- Sort -->
								<div class="btn-group">
									<button type="button" class="btn btn-secondary btn-sm" data-toggle="dropdown">
										<i class="fas fa-filter"></i>
									</button>
									<div class="dropdown-menu">
										<a class="dropdown-item" :class="(sortBy == 'name') ? 'selected-link' : '' " @click="sortUser(1)">Name</a>
										<a class="dropdown-item" :class="(sortBy == 'email') ? 'selected-link' : '' " @click="sortUser(2)">Email</a>
										<a class="dropdown-item" :class="(sortBy == 'created_at') ? 'selected-link' : '' " @click="sortUser(3)">Created</a>	
										<div class="dropdown-divider"></div>
										<input class="ml-4" type="radio" id="asc_user" name="sortin" v-bind:value="true" v-model="sortAsc"> Ascending<br>
										<input class="ml-4" type="radio" id="desc_user" name="sortin" v-bind:value="false" v-model="sortAsc"> Descending<br>
									</div>
								</div>

								<!-- Toggle view -->
								<!-- <button type="button" class="btn btn-secondary btn-sm" @click="table_view = !table_view">
									<div v-if="table_view">
										<i class="fas fa-table"></i>
									</div>
									<div v-else>
										<i class="fas fa-list"></i>
									</div>
								</button> -->

								<!-- Add new usser -->
								<button type="button" class="btn btn-secondary btn-sm" @click="createUserModal">
									<i class="fas fa-user-plus"></i>
								</button>

						</div>
					</div>
				
					<div class="card-body table-responsive p-0">
						<table class="table table-hover">
							<tbody class="recycler-view-table">
								<tr
									class="recycler-view-item pl-1"
									v-bind:class="getActiveUser(user.id)"
									v-for="user in orderedUsers()"
									v-show="user.role == role"
									:key="user.id"
									@click="viewUserDetail(user)"
								>
									<avatar :username="user.name" class="profile-image-thumb img-circle mr-2" style="float: left"></avatar>
									<p class="m-0 pt-2"><strong>{{ user.name }}</strong></p>
									<p class="mp-0"><small><em>{{ user.email }}</em></small></p>
								</tr>
							</tbody>
						</table>
					</div>
					
					<div class="card-footer">
						<h3 class="card-title pt-3 ml-3">Card Footer</h3>
					</div>

				</div>
			</div>

			<!-- User detail  -->
			<div class="col-md-6" v-show="showDetailUser">

				<!-- User title card -->
				<div class="card card-outline card-warning">
					<div class="card-header mb-0 pb-0">
						<h3 class="card-title">{{ auser.name }}'s Profile</h3>
						<div class="card-tools">
							<button type="button" class="btn btn-tool" @click="closeDetailUser()">
								<i class="fas fa-close hover-red"></i>
							</button>
						</div>
					</div>
					<div class="card-body">
						Lorem ipsum, dolor sit amet consectetur adipisicing elit. Possimus dolorem maiores cum fugiat qui. Repudiandae sunt modi eligendi nesciunt, assumenda unde optio, laudantium soluta dolore, praesentium reprehenderit reiciendis deserunt necessitatibus!
					</div>
				</div>

				<!-- User Family Member Card : start -->
				<div class="card collapsed-card"
				v-for="member in members"
				:key="member.id"
				@click="viewMemberDetail(member)">
					<div class="card-header mb-0 pb-0" v-bind:class="getActiveMember(member.id)">
						<h3 class="card-title">{{ member.name }}</h3>
						<div class="card-tools">
							<button type="button" class="btn btn-tool" @click="editMemberModal()">
								<i class="fas fa-user-edit hover-gold"></i>
							</button>
							<button type="button" class="btn btn-tool" data-widget="collapse">
								<i class="fas fa-chevron-down hover-gold"></i>
							</button>
						</div>
					</div>
					<div class="card-body" style="display: none;">
						<div class="row">
							<div class="col-md-4">
								<img :src="'img/profile/' + member.photo" class="profile-image img-thumbnail">
							</div>
							<div class="col-md-8">
								<table class="table table-borderless table-sm member-card-table">
									<tr>
										<td>
											<p class="mb-0"><span class="caps">Age : </span></p>
										</td>
										<td>
											<p class="mb-0"><strong>{{ member.age }} yrs</strong></p>
										</td>
										<td>
											<p class="mb-0"><span class="caps">Gender : </span></p>
										</td>
										<td>
											<p class="mb-0"><strong>{{ member.gender }}</strong></p>
										</td>
									</tr>
									<tr>
										<td>
											<p class="mb-0"><span class="caps">Weight : </span></p>
										</td>
										<td>
											<p class="mb-0"><strong>65 kg</strong></p>
										</td>
										<td>
											<p class="mb-0"><span class="caps">Height : </span></p>
										</td>
										<td>
											<p class="mb-0"><strong>150 cm</strong></p>
										</td>
									</tr>
									<tr>
										<td>
											<p class="mb-0"><span class="caps">Blood : </span></p>
										</td>
										<td>
											<p class="mb-0"><strong>{{ member.blood }}</strong></p>
										</td>
										<td>
											<p class="mb-0"><span class="caps">BMI : </span></p>
										</td>
										<td>
											<p class="mb-0"><strong>28.9</strong></p>
										</td>
									</tr>
									<tr>
										<td>
											<p class="mb-0"><span class="caps">Presure : </span></p>
										</td>
										<td>
											<p class="mb-0"><strong>80/120</strong></p>
										</td>
										<td>
											<p class="mb-0"><span class="caps">Sugar : </span></p>
										</td>
										<td>
											<p class="mb-0"><strong>135</strong></p>
										</td>
									</tr>
								</table>
							</div>
							<div class="col-12 ml-2">
								<p class="mp-0">{{ member.about }}, {{ lorem }}</p>
							</div>
						</div>
					</div>
        </div>
				<!-- User Family Member Card : end -->

			</div>

			<!-- User action  -->
			<div class="col-md-3" v-show="showDetailUser">

				<div class="card card-outline card-warning">
					<div class="card-body">					

						<div class="row">
							<img class="col-6 img-rounded" :src="getProfilePhoto()" alt="User Image" 
							style="object-fit: fill; max-width: 110px; max-height: 110px;">
							<div class="col-6 pl-0 mt-1">
									<a class="btn btn-block btn-outline-info btn-sm"
											style="width: 100px; height: 20px; line-height: 10px !important; font-weight: 700"
											@click="editUserProfile()">
											<small>Send Message</small>
									</a>
									<a class="btn btn-block btn-outline-success btn-sm mb-2 mt-2"
										style="width: 100px; height: 20px; line-height: 10px !important; font-weight: 700"
										@click="editUserProfile()">
										<small>Edit Profile</small>
									</a>								                                    
									<a class="btn btn-block btn-outline-danger btn-sm"
											style="width: 100px; height: 20px; line-height: 10px !important; font-weight: 700"
												@click="editUserProfile()">
											<small>Delete User</small>
									</a>                           
							</div>
					</div> 





					</div>
				</div>

				<div class="card">
					<div class="card-header mb-0 pb-0" v-bind:class="isMemberActive()">
						<h3 class="card-title">Quick Actions</h3>
					</div>
					<div class="card-body">
						<a class="qa-link" @click="addFamilyMember()">Book Appointment</a>
						<a class="qa-link" @click="addFamilyMember()">Add family member</a>
						<a class="qa-link" @click="addFamilyMember()">Add Health Record</a>
						<div class="dropdown-divider"></div>
						<a class="qa-link" @click="addFamilyMember()">Edit Profile</a>
						<a class="qa-link" @click="addFamilyMember()">Send Message</a>
						<a class="qa-link" @click="addFamilyMember()">Share Details</a>
						
					</div>
				</div>
			</div>

			<!-- No user selected -->
			<div class="col-md-9" v-show="!showDetailUser" style="height: 83vh; pink; position: relative; border: 1px solid #b2b2b2 !important; border-radius: 5px;">
				<img class="center-image img-circle" src="img/avatar2.png" width="150px" height="150px">
			</div>

		</div>

		<!-- Add/Edit User Modal -->
		<div
			id="userModal"
			class="modal fade"
			tabindex="-1"
			role="dialog"
			aria-labelledby="userModalTitle"
			aria-hidden="true"
		>
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="userModalTitle">{{ modalTitle }}</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>

					<form
						id="userForm"
						@submit.prevent="modalMode ? createUser() : editUser()"
						@keydown="form.onKeydown($event)"
					>
						<!-- Form fillable feilds -->
						<div class="modal-body">
							<!-- Name -->
							<div class="form-group">
								<input
									v-model="form.name"
									type="text"
									name="name"
									placeholder="Name"
									class="form-control"
									:class="{ 'is-invalid': form.errors.has('name') }"
								>
								<has-error :form="form" field="name"></has-error>
							</div>

							<!-- Email -->
							<div class="form-group">
								<input
									v-model="form.email"
									type="email"
									name="email"
									placeholder="Email"
									class="form-control"
									:class="{ 'is-invalid': form.errors.has('email') }"
								>
								<has-error :form="form" field="email"></has-error>
							</div>

							<!-- Member Role -->
							<div class="form-group">
								<select
									v-model="form.role"
									name="role"
									id="role"
									class="form-control"
									:class="{'is-invalid': form.errors.has('role')}"
								>
									<option disabled value>Please select member role</option>
									<option value="admin">Admin</option>
									<option value="user">user</option>
									<option value="staff">Staff</option>
									<option value="trainer">Trainer</option>
									<option value="nutritionist">Nutritionist</option>
								</select>
								<has-error :form="form" field="role"></has-error>
							</div>

							<!-- Password -->
							<div class="form-group">
								<input
									v-model="form.password"
									name="password"
									type="password"
									class="form-control"
									placeholder="Password"
									id="password"
									:class="{'is-invalid': form.errors.has('password')}"
								>
								<has-error :form="form" field="password"></has-error>
							</div>

							<!-- Accept Terms -->
							<div class="form-check ml-4">
								<input
									v-model="form.terms"
									type="checkbox"
									class="form-check-input"
									id="agreeterms"
								>
								<label class="form-check-label" for="agreeterms">I agree terms and conditions.</label>
								<has-error :form="form" field="terms"></has-error>
							</div>
						</div>

						<!-- From submit & reset buttons -->
						<div class="modal-footer">
							<button type="button" class="btn btn-warning" @click="resetForm">Reset</button>
							<button type="submit" class="btn btn-primary" :disabled="form.busy">{{ modalAction }}</button>
						</div>

					</form>
				</div>
			</div>
		</div>

  </div>
</template>

<script>
import Avatar from 'vue-avatar'
export default {
  data() {
    return {
      modalMode: true,
      modalTitle: "",
      modalAction: "",
      editUserId: 0,
      users: {},
			auser: {},
      showDetailUser: false,
			activeUserId: 0,
			members: {},
			amember: {},
      showDetailMember: false,
			activeMemberId: 0,
			table_view: true,
			role: "user",
			sortBy: "name",
			sortAsc: true,
			profileImageBackground: "#8e8e8e",
			lorem: "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quos sint quisquam velit perspiciatis quia, minus quibusdam repellat voluptas doloribus facilis aliquid, cupiditate sed. Minus similique, aspernatur officia consectetur facilis perferendis.",
      form: new Form({
        name: "",
        email: "",
        password: "",
        role: "",
        terms: ""
      })
    };
  },
  methods: {
		isUserSelf(name) {
			return this.auser.name == name;
		},
		memberCardClass(name) {
			if(this.isUsersOwnProfile(name)) {
				return 'card-outline card-warning';
			} else {
				return 'collapsed-card';
			}
		},
		isUsersOwnProfile(name) {
			return this.auser.name == name;
		},
		isMemberActive() {
			if (this.activeMemberId != 0)
				return 'activeMember';
		},
		editUserProfile() {
			console.log('edit');
		},
		closeDetailUser() {
			this.auser = {};
      this.showDetailUser = false;
			this.amember = {};
      this.showDetailMember = false;
			this.activeMemberId = 0;
		},
		addFamilyMember() {
			console.log('adding family member');
		},
		// API calls
    loadUser() {
      // if (this.$gate.canAccessAllMember()) {
				axios.get("api/user")
				.then(({ data }) => {
					(this.users = data)
					// console.log(data[5].photo[0].url);
				});
      // }
		},
		// Modals
    createUserModal() {
      this.form.reset();
      $("#userModal").modal("show");
      this.modalTitle = "Add New User";
      this.modalAction = "Create";
      this.modalMode = true; // means onSubmit it will send CREATE request
    },
    editUserModal(user) {
      $("#userModal").modal("show");
      this.modalTitle = "Edit User";
      this.modalAction = "Update";
      this.form.fill(user);
      this.editUserId = user.id;
      this.modalMode = false; // means onSubmit it will send UPDATE request
		},
		editMemberModal(user) {
      $("#userModal").modal("show");
      this.modalTitle = "Edit User";
      this.modalAction = "Update";
      this.form.fill(user);
      this.editUserId = user.id;
      this.modalMode = false; // means onSubmit it will send UPDATE request
    },
		changeUserRoleModal() {
			$("#changeUserRoleModal").modal("show");
		},
    sortUser($key) {
			console.log($key);
			switch ($key) {
				case 1:
					this.sortBy = "name";
					break;
				case 2:
					this.sortBy = "email";
					break;
				case 3:
					this.sortBy = "created_at";
					break;
				default:
					break;
			}
		},
		changeRole($key) {
			switch ($key) {
				case 1:
					this.role = "user";
					break;
				case 2:
					this.role = "member";
					break;
				case 3:
					this.role = "doctor";
					break;
				case 4:
					this.role = "staff";
					break;
				case 5:
					this.role = "admin";
					break;
				default:
					break;
			}
		},
    createUser() {
      // if (this.$gate.isAdmin()) {
      //   this.$Progress.start();
        this.form
          .post("api/user");
      //     .then(() => {
      //       Fire.$emit("reloadData");
      //       $("#userModal").modal("hide");
      //       Toast.fire({
      //         type: "success",
      //         title: "User created successfully"
      //       });
      //       this.$Progress.finish();
      //     })
      //     .catch(() => {
      //       this.$Progress.fail();
      //     });
      // } else {
      //   Swal.fire({
      //     title: "Unauthorized Action",
      //     text: "Contact your administrator to perform this action",
      //     type: "warning"
      //   });
      // }
    },
    editUser() {
      // if (this.$gate.isAdmin()) {
      //   if (this.editUserId > 0) {
      //     this.$Progress.start();
      //     this.form
      //       .put("api/user/" + this.editUserId)
      //       .then(() => {
      //         Fire.$emit("reloadData");
      //         $("#userModal").modal("hide");
      //         Toast.fire({
      //           type: "success",
      //           title: "User updated successfully"
      //         });
      //         this.editUserId = 0;
      //         this.$Progress.finish();
      //       })
      //       .catch(() => {
      //         this.editUserId = 0;
      //         this.$Progress.fail();
      //       });
      //   }
      // } else {
      //   Swal.fire({
      //     title: "Unauthorized Action",
      //     text: "Contact your administrator to perform this action",
      //     type: "warning"
      //   });
      // }
    },
    deleteUser(userId) {
      // if (this.$gate.isAdmin()) {
      //   Swal.fire({
      //     title: "Are you sure?",
      //     text: "You won't be able to revert this!",
      //     type: "warning",
      //     showCancelButton: true,
      //     confirmButtonColor: "#3085d6",
      //     cancelButtonColor: "#d33",
      //     confirmButtonText: "Yes, delete it!"
      //   }).then(result => {
      //     if (result.value) {
      //       // Send request to server
      //       this.form.delete("api/user/" + userId).then(() => {
      //         Fire.$emit("reloadData");
      //         Swal.fire("Deleted!", "Your file has been deleted.", "success");
      //       });
      //     }
      //   });
      // } else {
      //   Swal.fire({
      //     title: "Unauthorized Action",
      //     text: "Contact your administrator to perform this action",
      //     type: "warning"
      //   });
      // }
    },
    resetForm() {
      this.form.reset();
    },
    processFile(event) {
      this.photo = event.target.files[0];
    },
    getResults(page = 1) {
      // Our method to GET results from a Laravel endpoint
      axios.get("api/user?page=" + page).then(response => {
        this.users = response.data;
      });
    },
    viewUserDetail(clickedUser) {
      //alert("Clicked " + clickedUser.name);
      this.showDetailUser = true;
      this.activeUserId = clickedUser.id;
			this.auser = clickedUser;
			this.members = clickedUser.member;
		},
		viewMemberDetail(clickedMember) {
      // alert("Clicked " + clickedMember.name);
      this.showDetailMember = true;
      this.amember = clickedMember;
      this.activeMemberId = clickedMember.id;
    },
    getProfilePhoto() {
      if (this.showDetailUser) {
        if(this.auser.photo != null) {
          return this.auser.photo.length > 200
            ? this.auser.photo
            : "img/profile/" + this.auser.photo;
        } else {
          return "img/profile/default.png";
        }
      } else {
        return "";
      }
    },
    userProfilePhoto(user) {
			console.log(Object.values(user.photo.length));/*
			let photo = Object.values(user.photo).length;
      if(photo > 0) {
				Object.keys(user.photo).forEach(function(key) {
						console.log("img/profile/" + user.photo[key].thumb);
				});
			} else {
        return "img/profile/default.png";
			}
			}*/
		},
    getActiveUser(clickedUserId) {
      if (this.activeUserId === clickedUserId) {
        return "activeUser";
      }
		},
		getActiveMember(clickedMemberId) {
      if (this.activeMemberId === clickedMemberId) {
        return "activeMember";
      }
		},
		orderedUsers() {
			if (Object.keys(this.users).length > 0) {
				let result = _.orderBy(this.users, this.sortBy);
				if(!this.sortAsc) {
					return result.reverse();
				} else {
					return result;
				}
			} else {
				return this.users;
			}
		},
  },
  created() {
    // this.$Progress.start();
    this.loadUser();
    // Fire.$on("reloadData", () => {
    //   this.loadUser();
    // });
    // Fire.$on("searching", () => {
    //   let query = this.$parent.search;
    //   axios
    //     .get("api/findUser?q=" + query)
    //     .then(data => {
    //       this.users = data.data;
    //     })
    //     .catch(() => {});
    // });
  },
  mounted() {
		console.log("Component mounted.");		
    // this.$Progress.finish();
	},
	components: {
		Avatar
	}
};
</script>


<style scoped>
.pl-4,
.card-body.p-0 .table thead > tr > th:first-of-type,
.card-body.p-0 .table thead > tr > td:first-of-type,
.card-body.p-0 .table tbody > tr > th:first-of-type,
.card-body.p-0 .table tbody > tr > td:first-of-type,
.px-4 {
  padding-left: 0 !important;
}

.table .recycler-view-table th,
.table .recycler-view-table td {
  padding: 0 !important;
  border: 0 !important;
}

.table .recycler-view-table td:hover {
  background-color: #ededed;
}

.recycler-view-item {
  /* background-color: red !important; */
  border-bottom: 1px solid #b2b2b2;
}

.qa-link {
	display: block;
	cursor: pointer;
}

.qa-link:hover {
	color: dodgerblue !important;
}

.profile-image {
  width: 120px;
	height: 120px;
}

.profile-image-thumb {
  width: 40px;
  height: 40px;
  margin: 4px;
}

.profile-header {
  height: 160px;
  padding-top: 10px;
  padding-left: 15px;
  background-image: linear-gradient(
    to bottom right,
    rgba(255, 217, 0, 0.8),
    rgba(255, 166, 0, 0.8)
  );
}

.profile-name {
  font-variant: small-caps;
  font-size: 1.2rem;
}

.profile-email,
.profile-mobile,
.profile-id {
  font-size: 1rem;
  font-weight: 100;
}

.member-card-table>tr>td:hover {
	background-color: rgba(0, 100, 150, 0.1) !important;
}

.nav-item {
  min-width: 80px !important;
}
.nav-tabs {
  margin-top: 57px;
}

.activeUser {
  background-image: linear-gradient(
    to bottom right,
    rgba(255, 217, 0, 0.1),
    rgba(255, 166, 0, 0.5)
	);
}

.activeMember {
  background-image: linear-gradient(
    to bottom right,
    rgba(0, 100, 150, 0.1),
    rgba(0, 100, 150, 0.5)
	);
}

.card-title {
  z-index: 200;
}

.card-footer {
  padding: 0;
}

.img-circle {
  font-size: 18px;
  text-align: center;
  font-weight: 600;
}

/* .active {
  width: 20px;
  height: 20px;
  background-color: green;
  position: absolute;
  right: 0;
  margin-top: -25px;
  margin-left: -20px;
} */

.bg-red {
  background-image: linear-gradient(
    to bottom right,
    rgb(255, 0, 0),
    rgb(255, 71, 71)
  );
}

.bg-gold {
  background-image: linear-gradient(
    to bottom right,
    rgb(160, 0, 150),
    rgb(179, 44, 170)
  );
}

.bg-green {
  background-image: linear-gradient(
    to bottom right,
    rgb(0, 160, 0),
    rgb(60, 180, 60)
  );
}

.bg-blue {
  background-image: linear-gradient(
    to bottom right,
    rgb(0, 80, 255),
    rgb(35, 105, 255)
  );
}
</style>
