<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\StudentRepository;
use App\Entity\Student;

use App\Form\StudentType;

use Symfony\Component\HttpFoundation\Request;

class StudentController extends AbstractController
{
    /**
     * @Route("/student", name="student")
     */
    public function index(): Response
    {
        return $this->render('student/index.html.twig', [
            'controller_name' => 'StudentController',
        ]);
    }
    /**
     * @Route("/studentList", name="studentList")
     */
    public function readStudent()
    {
        $repository = $this->getDoctrine()->getRepository(Student::class);
        $students = $repository->findAll();

        return $this->render('student/listStudent.html.twig', [
            'students' => $students,
        ]);
    }
    /**
     * @Route("/addStudent", name="addStudent")
     */
    public function addEtudiant(Request $request)
    {
        $student = new Student();     
        $form = $this->createForm(StudentType::class, $student);
        $form->handleRequest($request);
        if ($form->isSubmitted()&& $form->isValid()) {
            $student = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($student);
            $em->flush();
            return $this->redirectToRoute('studentList');
         }
    return $this->render('student/addStudentWidget.html.twig', [
        'formA' => $form->createView()
        
    ]);
}
}
