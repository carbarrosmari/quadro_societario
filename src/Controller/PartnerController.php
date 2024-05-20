<?php

namespace App\Controller;

use App\Entity\Partner;
use App\Form\PartnerType;
use App\Repository\CompanyRepository;
use App\Repository\PartnerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PartnerController extends AbstractController
{
    #[Route('/company/{company_id}/partners', name: 'partners')]
    public function getPartners(Request $request,CompanyRepository $companyRepository): Response
    {
        $company = $companyRepository->find($request->get('company_id'));
        $data['companyId'] = $company->getId();
        $data['partners'] = $company->getPartners();
        $data['title'] = 'Gerenciar Sócios';
        return $this->render('partner/partners.html.twig', $data);
    }

    #[Route('/company/{company_id}/partner/create', name: 'partner_create')]
    public function createPartner(Request $request, PartnerRepository $partnerRepository): Response
    {
        $msg = '';
        $partner = new Partner();
        $form = $this->createForm(PartnerType::class, $partner);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $partnerRepository->save($partner);
            $msg = 'Partner created successfully';
        }

        $data['title'] = 'Adicionar Sócio';
        $data['companyId'] = $request->get('company_id');
        $data['form'] = $form;
        $data['msg'] = $msg;

        return $this->render('partner/create.html.twig', $data);
    }

    #[Route('/partner/{partner_id}/update', name: 'partner_update')]
    public function updatePartner(Request $request, PartnerRepository $partnerRepository): Response
    {
        $msg = '';
        $partner = $partnerRepository->find($request->get('partner_id'));
        $form = $this->createForm(PartnerType::class, $partner);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $partnerRepository->save($partner);
            $msg = 'Partner updated successfully';
        }

        $data['title'] = 'Editar Sócio';
        $data['form'] = $form;
        $data['msg'] = $msg;

        return $this->render('partner/update.html.twig', $data);
    }

    #[Route('/company/{company_id}/partner/{partner_id}/delete', name: 'partner_delete')]
    public function deletePartner(Request $request, PartnerRepository $partnerRepository): Response
    {
        $partner = $partnerRepository->find($request->get('partner_id'));
        $partnerRepository->remove($partner);
        return $this->redirectToRoute('partners', ['company_id' => $request->get('company_id')]);
    }
}
