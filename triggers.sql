create or replace function RI1()  returns trigger as $$

declare A box;


begin

A = (select zona from anomalia where new.id = id);

if new.zona2 && A then raise exception 'zona e zona2 sobrepõem-se'; end if;

return new;
end
$$ language plpgsql;

create trigger RI1 after insert on anomalia_traducao for each row execute procedure RI1();




create or replace function RI4()  returns trigger as $$ begin

if new.email not in ((select email from utilizador_qualificado) UNION (select email from utilizador_regular)) then 
raise exception 'utilizador não se encontra nas relações "utilizador _qualificado" ou "utilizador_regular".'; end if;
return new;
end
$$ language plpgsql;
																					 
create trigger RI4 after insert on utilizador for each row execute procedure RI4();




create or replace function RI5()  returns trigger as $$ begin

if new.email in (select email from utilizador_regular) then 
raise exception 'utilizador já se encontra na relação "utilizador_regular".'; end if;
return new;
end
$$ language plpgsql;

create trigger RI5 after insert on utilizador_qualificado for each row execute procedure RI5();




create or replace function RI6()  returns trigger as $$ begin

if new.email in (select email from utilizador_qualificado) then 
raise exception 'utilizador já se encontra na relação "utilizador_qualificado".'; end if;
return new;
end
$$ language plpgsql;

create trigger RI6 after insert on utilizador_regular for each row execute procedure RI6();
