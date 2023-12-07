<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blogs extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
        $act = $this->input->get('act');
        $id = $this->input->get('id');
        $view_data['head_page'] = "Halaman Utama";
        $view_data['body_page'] = "pages/$act";
        if($act == "list"){
            $view_data['head_page'] = "All Posts";
			$view_data['posts'] = $this->db->get('posts')->result();
        }elseif($act == "add"){
            $view_data['head_page'] = "Tambahkan Post";
            $view_data['body_page'] = "pages/form";
            $view_data['is_required'] = "required";

			if($this->input->post("add_post")){
				$judul = $this->input->post("judul");
				$penulis = $this->input->post("penulis");
				$konten = $this->input->post("konten");

				$filename = str_replace(' ', '-', $judul);
				$filename = preg_replace('/[^a-zA-Z0-9\-]/', '', $filename);
				$filename = strtolower($filename);

				$config['upload_path']          = './assets/img/thumbnail/';
				$config['file_name']            = $filename;
				$config['allowed_types']        = 'jpg|jpeg|png';
				$config['overwrite'] 			= true;

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('gambar')) {
					$this->session->set_flashdata('error', $this->upload->display_errors());
					redirect("blogs?act=add");
				} else {
					$file = $this->upload->data();
					$data = array(
						'judul' => $judul,
						'penulis' => $penulis,
						'konten' => $konten,
						'tgl_posting' => date('Y-m-d H:i:s'),
						'gambar_utama' => $file['file_name'],
					);
					$this->db->insert('posts', $data);
					$this->session->set_flashdata('success', "Post berhasil ditambahkan!");
					redirect("blogs?act=list");
				}
			}
        }elseif($act == "edit" && !empty($id)){
			$this->db->where("id_post", $id);
			$post = $this->db->get('posts')->row();
            $view_data['head_page'] = "Edit Post";
            $view_data['body_page'] = "pages/form";
            $view_data['form'] = $post;

			if($this->input->post("edit_post")){
				$judul = $this->input->post("judul");
				$penulis = $this->input->post("penulis");
				$konten = $this->input->post("konten");

				$filename = str_replace(' ', '-', $judul);
				$filename = preg_replace('/[^a-zA-Z0-9\-]/', '', $filename);
				$filename = strtolower($filename);

				$config['upload_path']          = './assets/img/thumbnail/';
				$config['file_name']            = $filename;
				$config['allowed_types']        = 'jpg|jpeg|png';
				$config['overwrite'] 			= true;

				$this->load->library('upload', $config);

				$data = array(
					'judul' => $judul,
					'penulis' => $penulis,
					'konten' => $konten,
				);
				if($this->upload->do_upload('gambar')){
					$file = $this->upload->data();
					$data['gambar_utama'] = $file['file_name'];
				}
				$this->db->where('id_post', $id);
				$this->db->update('posts', $data);
				$this->session->set_flashdata('success', "Post berhasil diubah!");
				redirect("blogs?act=list");
			}
        }elseif($act == "post" && !empty($id)){
			$this->db->where("id_post", $id);
			$post = $this->db->get('posts')->row();
            $view_data['head_page'] = $post->judul;
            $view_data['post'] = $post;
			$this->db->where("id_post", $id);
			$this->db->order_by("tgl_comment", "DESC");
            $view_data['comments'] = $this->db->get('comments')->result();

			if($this->input->post("add_comment")){
				$idp = $this->input->post("id");
				$nama = $this->input->post("nama_comment");
				$comment = $this->input->post("comment");

				$data = array(
					'id_post' => $idp,
					'nama' => $nama,
					'comment' => $comment,
					'tgl_comment' => date('Y-m-d H:i:s'),
				);
				$this->db->insert('comments', $data);
				// $this->session->set_flashdata('success', "Post berhasil ditambahkan!");
				redirect("blogs?act=post&id=$idp#comments");
			}
        }elseif($act == "delete" && !empty($id)){
			$this->db->where("id_post", $id);
			$this->db->delete('posts');
			$this->session->set_flashdata('success', "Post berhasil dihapus!");
			redirect("blogs?act=list");
        }elseif($act == "delcomment" && !empty($id)){
        	$idp = $this->input->get('post');
			$this->db->where("id_comment", $id);
			$this->db->delete('comments');
			$this->session->set_flashdata('success', "Komentar berhasil dihapus!");
			redirect("blogs?act=post&id=$idp#comments");
        }else{
            $view_data['body_page'] = "beranda.php";
        }
		$this->load->view('template', $view_data);
	}
}
